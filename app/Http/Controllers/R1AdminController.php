<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPosController extends Controller
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

        $stok = DB::table('pos_stok')->where('pos_id', $id)->pluck('jumlah', 'komponen');

        return view('admin_pos', compact('id', 'komponenList', 'stok'));
    }

    public function tambahKomponen(Request $r, $id)
    {
        $komponen = $r->input('komponen');
        $jumlah = (int) $r->input('jumlah');

        if (!$komponen || $jumlah <= 0) {
            return back()->with('error', 'Data tidak valid');
        }

        $existing = DB::table('pos_stok')
            ->where('pos_id', $id)
            ->where('komponen', $komponen)
            ->first();

        if ($existing) {
            DB::table('pos_stok')
                ->where('pos_id', $id)
                ->where('komponen', $komponen)
                ->increment('jumlah', $jumlah);
        } else {
            DB::table('pos_stok')->insert([
                'pos_id' => $id,
                'komponen' => $komponen,
                'jumlah' => $jumlah
            ]);
        }

        return back()->with('success', "Berhasil menambahkan $jumlah $komponen ke Pos $id");
    }
}
