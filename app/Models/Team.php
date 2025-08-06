<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Team extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_tim',
        'password',
        'asal_sekolah',
        'foto_bukti_pembayaran',  
        'unlocked_babak2',
        'total_uang_babak2',
        "harga_unlock","inventory_babak_2","total_uang_babak2"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function members()
    {
        return $this->hasMany(Member::class,"team_id");
    }
     public function komponen()
    {
        return $this->hasOne(Komponen::class, 'team_id');
    }
    public function sepeda()
    {
        return $this->hasOne(Sepeda::class);
    }
    public function poinBabak1()
    {
        return $this->hasOne(PoinBabak1::class);
    }
}
