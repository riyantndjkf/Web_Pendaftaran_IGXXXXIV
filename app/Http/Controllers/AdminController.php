<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Team;
use DB;
use Illuminate\Http\Request;

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
            'session_id' => 'required|exists:tsession,id'  // Ganti `session_table` dengan nama tabel yang sesuai
        ]);

        // Set semua sesi jadi non-aktif
        Session::where('jenis_sesi', 1)->update(['jenis_sesi' => 0]);

        // Aktifkan sesi terpilih
        Session::where('id', $request->session_id)->update(['jenis_sesi' => 1]);

        return redirect()->back()->with('success', 'Sesi berhasil diperbarui!');
    }
}
