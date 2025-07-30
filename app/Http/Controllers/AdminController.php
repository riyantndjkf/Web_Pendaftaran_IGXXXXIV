<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Team;
use App\Models\TeamMachine;

use App\Models\ConnectMachine;
use DB;
use Illuminate\Http\Request;
use Log;

class AdminController extends Controller
{
    public function rally1()
    {
        return view('admin.rally-1.index');
    }
    public function rally2()
    {
        $teams = Team::orderByDesc('poin_total_babak2')->get();
        $activeSession = DB::table('tsession')
            ->where('jenis_sesi', 1)
            ->latest('id')
            ->first();

        // Ambil semua sesi untuk select box
        $allSessions = DB::table('tsession')->get();

        return view('admin.rally-2.index', compact('teams', 'activeSession', 'allSessions'));
        
    }
public function gantisesi(Request $request)
{
    $request->validate([
        'session_id' => 'required|exists:tsession,id'
    ]);

    // 1. Nonaktifkan semua sesi
    Session::where('jenis_sesi', 1)->update(['jenis_sesi' => 0]);

    // 2. Aktifkan sesi yang dipilih
    Session::where('id', $request->session_id)->update(['jenis_sesi' => 1]);

    // 3. Ambil durasi sesi yang dipilih (dalam menit)
    $durasiSesi = Session::find($request->session_id)->durasi ?? 35;

    // 4. Load config mesin
    $config = config('machineupgrade');

    // 5. Proses semua tim
    $teams = Team::all();
    foreach ($teams as $team) {
        // --- Reset unlock dan hitung harga maintenance ---
        $teamMachines = TeamMachine::where('team_id', $team->id)->get();
        
        // Hitung biaya maintenance berdasarkan event sesi (jika diperlukan)
        $maintenanceCost = 2500; // Base maintenance cost
        
        $totalHargaMaintenance = count($teamMachines) * $maintenanceCost;

        $team->update([
            'unlocked_babak2' => 0,
            'harga_unlock' => $totalHargaMaintenance
        ]);

        // --- Buat peta mesin dan koneksi ---
        $machines = $teamMachines->keyBy('id');
        
        // Ambil semua koneksi antar mesin untuk tim ini
        $allConnections = ConnectMachine::all()->toArray();
        $teamMachineIds = $teamMachines->pluck('id')->toArray();
        $connections = collect($allConnections)->filter(function ($conn) use ($teamMachineIds) {
            return in_array($conn['source_team_machine_id'], $teamMachineIds);
        });

        $graph = [];
        foreach ($connections as $conn) {
            $graph[$conn['source_team_machine_id']][] = $conn['target_team_machine_id'];
        }

        // --- DFS: Temukan semua jalur A→B→C→D ---
        $hasilJalur = [];
        foreach ($machines as $tm) {
            if ($tm->jenis_mesin == 1) { // Mulai dari mesin A
                $this->cariJalur($tm->id, [$tm->id], $graph, $machines, $hasilJalur);
            }
        }

        // --- Hitung produksi total ---
        $produksiTotal = 0;
        
        foreach ($hasilJalur as $jalur) {
            if (count($jalur) !== 4) continue; // Harus lengkap A→B→C→D

            $kapasitas = [];
            $waktuTotal = 0;

            foreach ($jalur as $id) {
                $m = $machines[$id];
                $conf = $config[$m->jenis_mesin];
                
                // Ambil kapasitas dan waktu berdasarkan level
                $kapasitas[] = $conf['capacity_per_level'][$m->level];
                $waktuTotal += $conf['time_per_level'][$m->level];
            }

            // Hitung jumlah siklus produksi dalam durasi sesi
            $jumlahSiklus = floor($durasiSesi / $waktuTotal);
            
            // Produksi = siklus × kapasitas minimum
            $produksi = $jumlahSiklus * min(...$kapasitas);
            
            $produksiTotal += $produksi;
        }

        // --- Ambil sisa uang tim ---
        $sisaUang = $team->sisa_uang_babak_2 ?? 0;
        
        // --- Hitung poin total dari produksi dan uang ---
        $poinDariProduksi = $produksiTotal; // 1 poin per unit produksi
        $poinDariUang = floor($sisaUang / 10000); // $10000 = 1 poin
        $poinTotal = $poinDariProduksi + $poinDariUang;

        // --- Update data tim ---
        $team->update([
            'poin_total_babak2' => $poinTotal,
            'produksi_sesi_ini' => $produksiTotal
        ]);
        
        // --- Log aktivitas sesi (opsional) ---
        Log::info("Team {$team->id} ", [
            'produksi_total' => $produksiTotal,
            'sisa_uang' => $sisaUang,
            'poin_dari_produksi' => $poinDariProduksi,
            'poin_dari_uang' => $poinDariUang,
            'poin_total' => $poinTotal
        ]);
    }

    return redirect()->back()->with('success', 'Sesi berhasil diperbarui dan poin dihitung ulang!');
}

private function cariJalur($current, $path, $graph, $teamMachines, &$result)
{
    $jenisSekarang = $teamMachines[$current]->jenis_mesin ?? null;
    
    \Log::info("DFS - Current machine: {$current}, jenis: {$jenisSekarang}, path: " . implode('→', $path));

    // Jika sudah sampai mesin jenis 4, simpan jalur
    if ($jenisSekarang === 4) {
        $result[] = $path;
        \Log::info("DFS - Jalur lengkap ditemukan: " . implode('→', $path));
        return;
    }

    // Cari mesin berikutnya yang terhubung
    $nextMachines = $graph[$current] ?? [];
    \Log::info("DFS - Next machines dari {$current}: " . implode(', ', $nextMachines));
    
    foreach ($nextMachines as $next) {
        $jenisNext = $teamMachines[$next]->jenis_mesin ?? null;
        
        Log::info("DFS - Checking next machine {$next}, jenis: {$jenisNext}, expected: " . ($jenisSekarang + 1));
        
        // Pastikan mesin berikutnya adalah jenis yang tepat (1→2→3→4)
        if ($jenisNext === $jenisSekarang + 1) {
            Log::info("DFS - Valid connection found: {$current} (jenis {$jenisSekarang}) → {$next} (jenis {$jenisNext})");
            $this->cariJalur($next, array_merge($path, [$next]), $graph, $teamMachines, $result);
        } else {
            Log::warning("DFS - Invalid connection: {$current} (jenis {$jenisSekarang}) → {$next} (jenis {$jenisNext})");
        }
    }
}
}
