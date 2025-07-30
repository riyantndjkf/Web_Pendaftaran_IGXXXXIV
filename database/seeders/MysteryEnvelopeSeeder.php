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
                'team_id' => null
            ],
            [
                'id' => 2,
                'reward_amount' => 3000,
                'deskripsi_lokasi' => 'Meja Pelangi',
                'team_id' => null
            ],
            [
                'id' => 3,
                'reward_amount' => 3000,
                'deskripsi_lokasi' => 'Boulevard Teknik',
                'team_id' => null
            ],
            [
                'id' => 4,
                'reward_amount' => 3000,
                'deskripsi_lokasi' => 'Gedung TG',
                'team_id' => null
            ],
            [
                'id' => 5,
                'reward_amount' => 3000,
                'deskripsi_lokasi' => 'KSM Teknik Industri',
                'team_id' => null
            ],
            [
                'id' => 6,
                'reward_amount' => 4000,
                'deskripsi_lokasi' => 'Vending Machine TB',
                'team_id' => null
            ],
            [
                'id' => 7,
                'reward_amount' => 4000,
                'deskripsi_lokasi' => 'Kantin Keluwih',
                'team_id' => null
            ],
            [
                'id' => 8,
                'reward_amount' => 4000,
                'deskripsi_lokasi' => 'Tangga TF',
                'team_id' => null
            ],
            [
                'id' => 9,
                'reward_amount' => 4000,
                'deskripsi_lokasi' => 'Toilet TF Lantai 3',
                'team_id' => null
            ],
            [
                'id' => 10,
                'reward_amount' => 4000,
                'deskripsi_lokasi' => 'Lab Industri New',
                'team_id' => null
            ],
            [
                'id' => 11,
                'reward_amount' => 5000,
                'deskripsi_lokasi' => 'Lab TC 4 Informatika',
                'team_id' => null
            ],
            [
                'id' => 12,
                'reward_amount' => 5000,
                'deskripsi_lokasi' => 'Ruang Elektro',
                'team_id' => null
            ],
            [
                'id' => 13,
                'reward_amount' => 5000,
                'deskripsi_lokasi' => 'Tempat Sampah Farmasi',
                'team_id' => null
            ],
            [
                'id' => 14,
                'reward_amount' => 5000,
                'deskripsi_lokasi' => 'Tangga Gedung TG',
                'team_id' => null
            ],
            [
                'id' => 15,
                'reward_amount' => 5000,
                'deskripsi_lokasi' => 'Jembatan TF & TB',
                'team_id' => null
            ],
        ]);
    }
}
