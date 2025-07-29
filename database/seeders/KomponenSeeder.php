<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('komponen')->insert([
            'peserta_namaTim' => 'TimDemo',
            'wheel_26' => 2,
            'brake' => 1,
            'pedal' => 3,
            'basket' => 1
        ]);
    }
}
