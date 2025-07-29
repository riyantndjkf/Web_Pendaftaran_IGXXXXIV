<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
     use HasFactory;
    protected $table = 'tTeam';
    protected $fillable = ['nama_tim', 'total_uang', 'poin_total', 'current_session_int'];

    // Satu Tim memiliki satu Factory
    public function factory()
    {
        return $this->hasOne(Factory::class, 'idTeam');
    }

    // Satu Tim memiliki banyak Mesin
    public function teamMachines()
    {
        return $this->hasMany(TeamMachine::class, 'idTeam');
    }

    // Satu Tim mengerjakan banyak Soal/Task
    public function tasks()
    {
        return $this->hasMany(TeamTask::class, 'idTeam');
    }

    // Satu Tim memiliki banyak data Produksi (per sesi)
    public function productions()
    {
        return $this->hasMany(Production::class, 'idTeam');
    }
}
