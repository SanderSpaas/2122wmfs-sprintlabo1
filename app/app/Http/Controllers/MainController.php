<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club_ground;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Game;

class MainController extends Controller
{
    public function competition($id, Request $request)
    {
        $test = Competition::findOrFail($id);
        if ($request->score == 'yes') {
            $games = Game::where('competition_id', $id)->whereNotNull('home_score')->whereNotNull('away_score')->with('clubHome', 'clubAway', 'competition', 'club_ground')->get();
        }
        if ($request->score == 'no') {
            $games = Game::where('competition_id', $id)->whereNull('home_score')->whereNull('away_score')->with('clubHome', 'clubAway', 'competition', 'club_ground')->get();
        }
        if ($request->score == '') {
            $games = Game::where('competition_id', $id)->with('clubHome', 'clubAway', 'competition', 'club_ground')->get();
        }
        dump($games);
        return view('competitions', compact('games', 'request'));
    }
    public function add()
    {
        $teams = Club::all();
        return view('addGame', compact('teams'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'home_club_id' => 'required|numeric',
            'away_club_id' => 'required|numeric',
            'home_score' => 'numeric|min:0',
            'away_score' => 'numeric|min:0',
            'datetime-local' => 'timestamp',
        ]);
        $test = Competition::findOrFail($request->home_club_id);
        $test = Competition::findOrFail($request->away_club_id);

        $game = new Game;
        $game->home_club_id = $request->home_club_id;
        $game->away_club_id = $request->away_club_id;
        $game->home_score = $request->home_score;
        $game->away_score = $request->away_score;
        $game->starts_at = $request->starts_at;
        $game->competition_id = 1;
        $game->club()->associate($request->home_club_id);
        $game->club()->associate($request->away_club_id);
        $game->save();
        return redirect('/');
    }
}
