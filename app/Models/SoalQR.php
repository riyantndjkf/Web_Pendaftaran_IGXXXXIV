<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalQR extends Model
{
    protected $table = 'tsoalqr';

    protected $guarded = [
        'id',
        'level',
        'pertanyaan',
        'reward_amount',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'jawaban_benar',
        'gambar_soal',
    ];
}