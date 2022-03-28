<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['home_club_id', 'away_club_id', 'home_score', 'away_score', 'starts_at', 'updated_at'];
    protected $hidden = ['id', 'created_at'];
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
