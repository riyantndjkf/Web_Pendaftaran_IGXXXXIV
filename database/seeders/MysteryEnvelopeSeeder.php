<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MysteryEnvelopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tmysteryenvelope')->insert([
            [
                'id' => 1,
                'reward_amount' => 3000,
                'deskripsi_lokasi' => 'Gazebo Teknik',
                'tTeam_id' => null
            ],
        ]);
    }
}
