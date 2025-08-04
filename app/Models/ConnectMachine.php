<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectMachine extends Model
{
    protected $table = 'tconnectmachine';

    protected $fillable = [
        'source_team_machine_id',
        'target_team_machine_id',
        ""
    ];
}
