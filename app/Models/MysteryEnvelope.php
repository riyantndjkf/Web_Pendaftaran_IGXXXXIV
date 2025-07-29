<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MysteryEnvelope extends Model
{
    protected $table = 'tmysteryenvelope';

    protected $guarded = [
        'id',
        'reward_amount',
        'deskripsi_lokasi',
        'tTeam_id',
    ];
}
