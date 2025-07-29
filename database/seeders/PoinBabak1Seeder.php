<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoinBabak1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('poin_babak1')->insert([
            'sepeda_komponen_peserta_namaTim1' => 'TimDemo',
            'poin' => 100,
            'sesi' => 1
        ]);
    }
}
