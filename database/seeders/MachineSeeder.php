<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Machine::create([
            'name' => 'Mesin Pemotong & Bending Pipa',
            'jenis' => 'Memotong pipa baja/aluminium dan membentuknya sesuai bentuk rangka (frame).',
            'harga_dasar' => 3000,
            'kapasitas_dasar' => 5,
            'base_time' => 5, // dalam menit
            'biaya_maintenance' => 2500,
        ]);

        Machine::create([
            'name' => 'Mesin las otomatis',
            'jenis' => 'Menggabungkan pipa-pipa menjadi rangka sepeda dengan pengelasan.',
            'harga_dasar' => 4000,
            'kapasitas_dasar' => 10,
            'base_time' => 7, // dalam menit
            'biaya_maintenance' => 2500,
        ]);

        Machine::create([
            'name' => 'Mesin pengecatan & Oven',
            'jenis' => 'Memberi warna dan pelindung pada rangka (coating + pengeringan).',
            'harga_dasar' => 2500,
            'kapasitas_dasar' => 8,
            'base_time' => 6, // dalam menit
            'biaya_maintenance' => 2500,
        ]);

        Machine::create([
            'name' => 'Mesin Perakitan',
            'jenis' => 'Merakit seluruh bagian (rangka, roda, stang, rem, gear, sadel).',
            'harga_dasar' => 3000,
            'kapasitas_dasar' => 6,
            'base_time' => 4, // dalam menit
            'biaya_maintenance' => 2500,
        ]);
    }
}
