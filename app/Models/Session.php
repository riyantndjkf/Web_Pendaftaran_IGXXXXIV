<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'tsession';
    protected $fillable = [
        'durasi',
        'demand',
        'event',
    ];
    public function productions()
    {
        return $this->hasMany(Production::class, 'idSession');
    }
}
