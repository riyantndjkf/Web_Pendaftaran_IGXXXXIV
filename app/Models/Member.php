<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'status',
        'nama_lengkap',
        'alamat',
        'nomor_telepon',
        'email',
        'riwayat_penyakit',
        'alergi',
        'path_kartu_pelajar',
    ];

    // Setiap member dimiliki oleh satu team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}