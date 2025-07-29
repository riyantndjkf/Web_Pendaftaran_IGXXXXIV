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
            'durasi' => 35,
            'demand' => 30,
            'event' => null,
        ]);

        Session::create([
            'id' => 2,
            'durasi' => 35,
            'demand' => 50,
            'event' => 'reward_amount * 1.5',
        ]);

        Session::create([
            'id' => 3,
            'durasi' => 35,
            'demand' => 35,
            'event' => 'maintenance * 1.5',
        ]);

        Session::create([
            'id' => 4,
            'durasi' => 35,
            'demand' => 70,
            'event' => null,
        ]);
    }
}
