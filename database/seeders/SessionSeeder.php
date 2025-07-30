<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Session::create([
            'id' => 1,
            "jenis_sesi" => 1,
            'durasi' => 35,
            'demand' => 30,
            'event' => null,
        ]);

        Session::create([
            'id' => 2,
            "jenis_sesi" => 0,
            'durasi' => 35,
            'demand' => 50,
            'event' => 'reward_amount * 1.5',
        ]);

        Session::create([
            'id' => 3,
            "jenis_sesi" => 0,
            'durasi' => 35,
            'demand' => 35,
            'event' => 'maintenance * 1.5',
        ]);

        Session::create([
            'id' => 4,
            "jenis_sesi" => 0,
            'durasi' => 35,
            'demand' => 70,
            'event' => null,
        ]);
    }
}
