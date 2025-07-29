<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosStokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pos_stok')->insert([
            ['pos_id' => 1, 'komponen' => 'wheel_26', 'jumlah' => 3],
            ['pos_id' => 1, 'komponen' => 'basket', 'jumlah' => 2],
            ['pos_id' => 2, 'komponen' => 'brake', 'jumlah' => 4],
        ]);
    }
}
