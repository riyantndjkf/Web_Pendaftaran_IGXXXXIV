<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class R1AdminController extends Controller
{
    public function index($id)
    {
        $komponenList = [
            'wheel_26',
            'wheel_27',
            'wheel_16',
            'city_frame',
            'mountain_frame',
            'folding_frame',
            'unicycle_frame',
            'hinge',
            'mountain_suspension',
            'brake',
            'pedal',
            'chain_and_gear',
            'basket'
        ];

        $timHariIni = DB::table('riwayat_pos')
            ->where('pos_id', $id)
            ->whereDate('waktu', today())
            ->pluck('peserta_namaTim')
            ->toArray();

        $timList = DB::table('peserta')->pluck('namaTim');
        $pos = DB::table('pos')->where('id', $id)->first();

        return view('admin_pos', compact('id', 'komponenList', 'timList', 'pos', 'timHariIni'));
    }

    public function overview()
    {
        $posList = DB::table('pos')->get();
        return view('admin_overview', compact('posList'));
    }

    public function tandaiGagal($id)
    {
        DB::table('pos')->where('id', $id)->update(['status' => 'kosong']);
        return back()->with('success', 'Pos berhasil direset menjadi kosong (tim gagal).');
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');

        DB::table('pos')->where('id', $id)->update([
            'status' => $status
        ]);

        return back()->with('success', "Status Pos $id diperbarui ke $status");
    }

    public function gagal($id)
    {
        DB::table('pos')->where('id', $id)->update(['status' => 'kosong']);
        return back()->with('success', "Tim dinyatakan gagal. Status Pos $id direset.");
    }

    public function beriKomponen(Request $r, $id)
    {
        $tim = $r->input('tim');
        $komponen = $r->input('komponen');
        $jumlah = (int) $r->input('jumlah');

        if (!$tim || !$komponen || $jumlah <= 0) {
            return back()->with('error', 'Data tidak valid');
        }

        $fieldExists = Schema::hasColumn('komponen', $komponen);
        if (!$fieldExists) {
            return back()->with('error', 'Kolom komponen tidak ditemukan di tabel komponen');
        }

        DB::table('komponen')->updateOrInsert(
            ['peserta_namaTim' => $tim],
            [$komponen => DB::raw("$komponen + $jumlah")]
        );

        return back()->with('success', "Berhasil memberikan $jumlah $komponen ke tim $tim");
    }
}
