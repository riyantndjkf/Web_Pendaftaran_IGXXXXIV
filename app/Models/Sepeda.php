<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sepeda extends Model
{
    

    protected $table = 'sepeda';

    protected $fillable = [
        'team_id', 'city', 'folding', 'mountain', 'unicycle',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

