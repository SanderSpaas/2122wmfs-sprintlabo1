<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
    public function club()
    {
        return $this->belongsTo(Club::class, 'id');
    }
    public function clubHome()
    {
        return $this->belongsTo(Club::class, 'home_club_id', 'id');
    }
    public function clubAway()
    {
        return $this->belongsTo(Club::class, 'away_club_id', 'id');
    }
    public function club_ground()
    {
        // return $this->belongsTo(Club::class);
        return $this->hasOneThrough(Club_ground::class, club::class, 'id');
    }

}
