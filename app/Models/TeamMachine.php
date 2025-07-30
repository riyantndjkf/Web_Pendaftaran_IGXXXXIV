<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMachine extends Model
{
    protected $table = 'tteammachine';
    protected $fillable = ['team_id', 'tmachine_id', 'level',  'operater_hired',"kapasitas_dasar","base_time",'biaya_jual'];

    public function team() {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function machine() {
        return $this->belongsTo(Machine::class, 'tmachine_id'); // gunakan nama kolom DB
    }

    public function connectedTo()
    {
        return $this->belongsToMany(
            TeamMachine::class,
            'tconnectmachine',
            'source_team_machine_id',
            'target_team_machine_id'
        );
    }

    public function connectedFrom()
    {
        return $this->belongsToMany(
            TeamMachine::class,
            'tconnectmachine',
            'target_team_machine_id',
            'source_team_machine_id'
        );
    }

}
