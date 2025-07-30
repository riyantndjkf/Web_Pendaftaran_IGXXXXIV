<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoinBabak1 extends Model
{
    use HasFactory;

    protected $table = 'poin_babak1';

    protected $fillable = [
        'sepeda_komponen_peserta_namaTim1',
        'poin',
        'sesi',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}