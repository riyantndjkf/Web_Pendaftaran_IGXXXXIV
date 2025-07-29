<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class R1PesertaController extends Controller
{
    private $sesiHarga = [
        1 => ['city' => 40, 'folding' => 75, 'mountain' => 60],
        2 => ['city' => 45, 'folding' => 80, 'mountain' => 65],
        3 => ['city' => 40, 'folding' => 75, 'mountain' => 60, 'unicycle' => 30],
        4 => ['city' => 30, 'folding' => 55, 'mountain' => 45, 'unicycle' => 20],
    ];

    private $posKomponen = [
        1 => ['wheel_26' => 1],
        2 => ['city_frame' => 1],
        3 => ['basket' => 1],
        4 => ['wheel_16' => 1],
        5 => ['folding_frame' => 1],
        6 => ['hinge' => 1],
        7 => ['mountain_frame' => 1],
        8 => ['mountain_suspension' => 1],
        9 => ['unicycle_frame' => 1],
        10 => ['brake' => 1],
        11 => ['pedal' => 1],
        12 => ['chain_and_gear' => 1],
    ];

    private function getTim()
    {
        return session('namaTim') ?? 'TimDemo';
    }

    private function getSesiAktif()
    {
        $start = Carbon::parse('2025-07-23 00:00:00');
        $minute = Carbon::now()->diffInMinutes($start);
        return min(4, floor($minute / 30) + 1);
    }

    public function showPos($id)
    {
        $komponen = DB::table('pos_stok')
            ->where('pos_id', $id)
            ->where('jumlah', '>', 0)
            ->get();

        return view('pos_peserta', compact('id', 'komponen'));
    }

    public function klaimPos(Request $r, $id)
    {
        $tim = $this->getTim();
        $komponen = $r->input('komponen');
        $jumlah = (int) $r->input('jumlah');

        $stok = DB::table('pos_stok')
            ->where('pos_id', $id)
            ->where('komponen', $komponen)
            ->value('jumlah');

        if ($stok < $jumlah) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        DB::table('komponen')->updateOrInsert(
            ['peserta_namaTim' => $tim],
            [$komponen => DB::raw("COALESCE($komponen, 0) + $jumlah")]
        );

        DB::table('pos_stok')
            ->where('pos_id', $id)
            ->where('komponen', $komponen)
            ->decrement('jumlah', $jumlah);

        return back()->with('success', "Berhasil ambil $jumlah $komponen");
    }

    public function showAllPos()
    {
        return view('pos', ['posKomponen' => $this->posKomponen]);
    }

    public function showProduksi()
    {
        $tim = $this->getTim();
        $data = DB::table('komponen')->where('peserta_namaTim', $tim)->first();

        $resep = [
            'city' => ['wheel_26' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'city_frame' => 1, 'basket' => 1],
            'folding' => ['wheel_16' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'folding_frame' => 1, 'hinge' => 4],
            'mountain' => ['wheel_27' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'mountain_frame' => 1, 'mountain_suspension' => 2],
            'unicycle' => ['wheel_16' => 1, 'pedal' => 2, 'chain_and_gear' => 2, 'unicycle_frame' => 1],
        ];

        return view('produksi', compact('data', 'resep'));
    }

    public function produksiSepeda($jenis)
    {
        $tim = $this->getTim();
        $komponen = DB::table('komponen')->where('peserta_namaTim', $tim)->first();

        $resep = [
            'city' => ['wheel_26' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'city_frame' => 1, 'basket' => 1],
            'folding' => ['wheel_16' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'folding_frame' => 1, 'hinge' => 4],
            'mountain' => ['wheel_27' => 2, 'brake' => 2, 'pedal' => 2, 'chain_and_gear' => 2, 'mountain_frame' => 1, 'mountain_suspension' => 2],
            'unicycle' => ['wheel_16' => 1, 'pedal' => 2, 'chain_and_gear' => 2, 'unicycle_frame' => 1],
        ];

        if (!isset($resep[$jenis])) return back()->with('error', 'Jenis tidak ditemukan');

        foreach ($resep[$jenis] as $key => $jumlah) {
            if (($komponen->$key ?? 0) < $jumlah) {
                return back()->with('error', 'Komponen tidak cukup untuk merakit ' . $jenis);
            }
        }

        foreach ($resep[$jenis] as $key => $jumlah) {
            DB::table('komponen')->where('peserta_namaTim', $tim)->decrement($key, $jumlah);
        }

        DB::table('sepeda')->updateOrInsert(
            ['komponen_peserta_namaTim' => $tim],
            [$jenis => DB::raw("$jenis + 1")]
        );

        return back()->with('success', "Berhasil merakit sepeda $jenis");
    }

    public function showJual()
    {
        $tim = $this->getTim();
        $stok = DB::table('sepeda')->where('komponen_peserta_namaTim', $tim)->first();
        $sesi = $this->getSesiAktif();
        $harga = $this->sesiHarga[$sesi];

        return view('jual', compact('stok', 'sesi', 'harga'));
    }

    public function jualSepeda(Request $r)
    {
        $tim = $this->getTim();
        $sesi = $this->getSesiAktif();
        $harga = $this->sesiHarga[$sesi];

        $total = 0;
        foreach ($harga as $jenis => $h) {
            $jumlah = (int) $r->input($jenis, 0);
            DB::table('sepeda')->where('komponen_peserta_namaTim', $tim)->decrement($jenis, $jumlah);
            $total += $jumlah * $h;
        }

        DB::table('poin_babak1')->updateOrInsert(
            ['sepeda_komponen_peserta_namaTim1' => $tim],
            ['poin' => DB::raw("poin + $total"), 'sesi' => $sesi]
        );

        return back()->with('success', "Berhasil menjual. Pemasukan: $$total");
    }
}
