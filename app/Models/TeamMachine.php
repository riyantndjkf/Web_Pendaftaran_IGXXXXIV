<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMachine extends Model
{
    use HasFactory;
    protected $table = 'tTeamMachine';
    protected $fillable = ['idTeam', 'idMachine', 'level', 'is_active', 'operator_hired'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'idTeam');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'idMachine');
    }
}
