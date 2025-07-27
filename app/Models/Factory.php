<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;
    protected $table = 'tFactory';
    protected $fillable = ['idTeam', 'is_unlocked', 'idMaintenance', 'biaya_unlock', 'waktu_unlock'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'idTeam');
    }
}
