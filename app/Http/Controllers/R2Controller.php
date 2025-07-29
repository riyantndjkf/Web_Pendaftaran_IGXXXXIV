<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class R2Controller extends Controller
{
    public function index()
    {
        $gameData = [
            'timer' => '25:33',
            'demand' => [
                'current' => 35,
                'fulfilled' => 0
            ],
            'capital' => 100000,
            'factories' => [
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 5],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 3],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 4],
                ['unlocked' => true, 'active' => true, 'owned' => true, 'workers' => 2],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => true, 'active' => true],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
                ['unlocked' => false, 'active' => false],
            ],
            'unlock_cost' => 100000,
            'show_unlock_modal' => false
        ];

        return view('peserta.rally-2.index', compact('gameData'));
    }

    public function unlock(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Factory unlocked successfully!'
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
        if (!session()->get("akses_soal_$id")) {
            abort(403, "Akses soal hanya bisa dilakukan melalui QR scan.");
        }

        $soal = SoalQR::findOrFail($id);
        return view('rally-2.question', compact('soal'));
    }

    public function submitQR(Request $request, $id)
    {
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
}
