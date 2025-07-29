<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('peserta')->insert([
        'namaTim' => 'TimDemo',
        'password' => null,
        'peserta1' => 'Cent',
        'email' => 'timdemo@email.com',
        // kolom lain bisa null
    ]);
}
}
