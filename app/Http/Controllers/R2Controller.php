<?php

namespace App\Http\Controllers;
use App\Models\Machine;
use App\Models\TeamMachine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\SoalQR;
use App\Models\MysteryEnvelope;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class R2Controller extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $team = Team::where('nama_tim', $user->name)->firstOrFail();

        // Ambil semua mesin
        $allMachines = Machine::all();

        // Ambil mesin yang dimiliki tim
        $ownedMachines = TeamMachine::where('team_id', $team->id)->get()->keyBy('tmachine_id');

        $factories = $allMachines->map(function ($machine) use ($ownedMachines) {
            $owned = $ownedMachines->has($machine->id);
            $ownedData = $ownedMachines->get($machine->id);

            return [
                'machine_id' => $machine->id,
                'name' => $machine->name,
                'jenis' => $machine->jenis,
                'harga_dasar' => $machine->harga_dasar,
                'kapasitas_dasar' => $machine->kapasitas_dasar,
                'base_time' => $machine->base_time,
                'biaya_maintenance' => $machine->biaya_maintenance,
                'owned' => $owned,
                'level' => $owned ? $ownedData->level : null,
                'is_active' => $owned ? $ownedData->is_active : null,
                'operator_hired' => $owned ? $ownedData->operator_hired : null,
            ];
        });

        $gameData = [
            'timer' => '00:00',
            'elapsed_seconds' => session('rally2_timer', 0),
            'demand' => [
                'current' => 35,
                'fulfilled' => 0
            ],
            'capital' => $team->total_uang_babak2,
            'factories_locked' => !$team->unlocked_babak2,
            'unlock_cost' => 100000,
            "machine"=> $allMachines,
            'factories' => $factories
        ];

        return view('peserta.rally-2.index', compact('gameData'));
    }


    public function unlockFactory(Request $request)
    {
        $user = Auth::user();
        $team = Team::where('nama_tim', $user->name)->firstOrFail();

        $unlockCost = 100000;

        if ($team->unlocked_babak2) {
            return response()->json(['message' => 'Factory already unlocked.'], 400);
        }

        if ($team->total_uang_babak2 < $unlockCost) {
            return response()->json(['message' => 'Not enough capital to unlock factory.'], 400);
        }

        $team->unlocked_babak2 = true;
        $team->total_uang_babak2 -= $unlockCost;
        $team->save();

        session(['rally2_timer' => 0]); // Optional reset timer
        session(['rally2_unlocked' => true]);

        return response()->json([
            'message' => 'Factory unlocked successfully.',
            'capital' => $team->total_uang_babak2
        ]);
    }
   
    public function scanner()
    {
        return view('peserta.rally-2.scanner');
    }

    public function events()
    {
        return view('peserta.rally-2.events');
    }

    public function inventory()
    {
        return view('peserta.rally-2.inventory');
    }

    public function question()
    {
        return view('peserta.rally-2.question');
    }

    //SOAL QR
    public function showQR($id)
    {
        // Cegah akses tanpa QR
        if (!session()->get("akses_soal_$id")) {
            abort(403, "Akses soal hanya bisa dilakukan melalui QR Scan.");
        }

        $soal = SoalQR::findOrFail($id);

        // Cek apakah peserta sudah pernah membuka soal ini sebelumnya
        $pernahAkses = session()->get("pernah_akses_$id", false);

        // Tandai bahwa soal sudah pernah diakses
        session()->put("pernah_akses_$id", true);

        return view('peserta.rally-2.question', compact('soal', 'pernahAkses'));
    }

    public function submitQR(Request $request, $id)
    {
        Log::info("ID Soal : " . $id);
        $soal = SoalQR::findOrFail($id);

        // Fungsi normalisasi jawaban
        $normalize = function ($str) {
            $str = trim(strtolower($str));
            $str = preg_replace('/^\$+|\$+$/', '', $str); // hilangkan tanda $
            $str = str_replace(['\mathrm{', '\mathrm', '{', '}', '_'], '', $str); // hilangkan LaTeX formatting
            $str = preg_replace('/\^\{(.+?)\}/', '$1', $str); // ubah ^{3-} jadi 3-
            $str = str_replace(['^', '−', '–'], ['','-','-'], $str); // hilangkan ^, ubah minus unicode ke ASCII
            return $str;
        };

        // Normalisasi input user dan jawaban benar
        $jawabanUser = $normalize($request->input('jawaban'));
        $jawabanBenar = $normalize($soal->jawaban_benar);

        // Logging untuk debug
        Log::info("JAWABAN USER: " . $jawabanUser);
        Log::info("JAWABAN BENAR: " . $jawabanBenar);
        
        // Perbandingan
        $status = $jawabanUser === $jawabanBenar ? 'benar' : 'salah';

        return response()->json([
            'status' => $status,
            'reward' => $status === 'benar' ? $soal->reward_amount : null
        ]);
    }

    // MYSTERY ENVELOPE
    public function claim($id)
    {
        // Batasi hanya lewat scan (opsional, seperti soal)
        if (!session()->get("akses_envelope_$id")) {
            abort(403, "Akses hanya bisa dilakukan melalui QR Scan.");
        }

        $envelope = MysteryEnvelope::where('id', $id)->first();

        if (!$envelope) {
            abort(404, "Envelope tidak ditemukan.");
        }

        // Cek apakah tim sudah klaim sebelumnya (opsional)
        if ($envelope->tTeam_id) {
            return redirect()
                ->route('peserta.rally-2.scanner') // ganti ini dengan rute tempat peserta diarahkan kembali
                ->with('error', 'Envelope ini sudah diklaim oleh tim lain.');
        }

        // Simpan ke log atau tandai sebagai sudah diklaim (opsional)

        // Kirim tampilan reward
        return view('peserta.rally-2.claim-envelope', compact('envelope'));
    }



    //============= MAIN RALLY 2 ====================//
    public function buyMachine(Request $request)
    {
        $user = Auth::user();
        $team = Team::where('nama_tim', $user->name)->firstOrFail();

        $machineId = $request->input('machine_id');
        $machine = Machine::findOrFail($machineId);

        $alreadyOwned = TeamMachine::where('team_id', $team->id)
        ->where('tmachine_id', $machineId)
        ->exists();

        if ($alreadyOwned) {
            return response()->json(['error' => 'Mesin sudah dimiliki.'], 400);
        }

        if ($team->total_uang_babak2 < $machine->harga_dasar) {
            return response()->json(['error' => 'Uang tidak mencukupi.'], 400);
        }

        // Kurangi uang tim
        $team->total_uang_babak2 -= $machine->harga_dasar;
        $team->save();

        // Simpan ke t_team_machines
        try {
            TeamMachine::create([
                'team_id' => $team->id,
                'tmachine_id' => $machineId,
                'level' => 1,
                'is_active' => false,
                'operator_hired' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } catch (\Exception $e) {
            Log::error("Gagal menyimpan TeamMachine: " . $e->getMessage());
            return response()->json(['error' => 'Gagal menyimpan mesin.'], 500);
        }

        return response()->json([
            'message' => 'Pembelian berhasil!',
            'capital' => $team->total_uang_babak2,
            'machine_id' => $machineId,
        ]);
    }

}
