<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $table = 'tMachine';

    protected $fillable = [
        'name',
        'jenis', 
        'harga_dasar',
        'kapasitas_dasar',
        'base_time',
        'biaya_maintenance',
    ];

    public function teamMachines()
    {
        return $this->hasMany(TeamMachine::class, 'idMachine');
    }
}
