@extends('layout')
@section('content')
    <div class="col s12">
        <h2>{{ $games[0]->competition->name}}</h2>
        <hr />

        <h3>Wedstrijden</h3>
        <a class="waves-effect waves-light btn-small" @if($request->score == "yes") disabled @endif href="?score=yes">Met score</a>
        <a class="waves-effect waves-light btn-small" @if($request->score == "no") disabled @endif href="?score=no">Zonder score</a>
        <a class="waves-effect waves-light btn-small" @if($request->score == "") disabled @endif href="?score=">Allemaal</a>
        <table class="striped bordered">
            <thead>
                <tr>
                    <th>Tijdstip</th>
                    <th>Thuisploeg</th>
                    <th>Score</th>
                    <th>Uitploeg</th>
                    <th>Locatie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td class="purple-text text-lighten-1">{{$game->starts_at}}</td>
                        <td>{{$game->clubHome->name}}</td>
                        <td>{{ $game->home_score }} - {{ $game->away_score }}</td>
                        <td>{{$game->clubAway->name}}</td>
                        <td class="teal-text text-darken-2">{{$game->club_ground->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
    </div>
    </div>
@endsection
@section('footer')
