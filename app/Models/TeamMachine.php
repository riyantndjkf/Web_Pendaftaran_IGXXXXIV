<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMachine extends Model
{
    protected $table = 'tteammachine';
    protected $fillable = ['team_id', 'tmachine_id', 'level', 'is_active', 'operater_hired'];

    public function team() {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function machine() {
        return $this->belongsTo(Machine::class, 'tmachine_id'); // gunakan nama kolom DB
    }
}
