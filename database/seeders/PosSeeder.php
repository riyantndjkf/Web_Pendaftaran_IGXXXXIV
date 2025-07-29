<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            DB::table('pos')->insert([
                'nama' => 'Pos ' . $i,
                'status' => 'kosong',
            ]);
        }
    }
}
