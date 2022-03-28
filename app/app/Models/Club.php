<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    public function club_grounds()
    {
        return $this->belongsTo(Club_ground::class);
    }

    public function Games()
    {
        return $this->hasMany(Game::class);
    }
    // public function GameAway()
    // {
    //     return $this->hasMany(Game::class, 'away_club_id');
    // }
}
