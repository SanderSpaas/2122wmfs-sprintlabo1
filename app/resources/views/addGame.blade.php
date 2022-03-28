@extends('layout')
@section('content')
    <form class="col s12" method="post" action="add">
        @csrf
        <h2>Wedstrijd toevoegen</h2>
        <div class="row">
            <div class="col s12 red-text">
                @include('common.errors')
            </div>
            <div class="input-field col s12 m6">
                <select name="home_club_id">
                    <option value="" disabled>Selecteer thuisploeg</option>
                    @foreach ($teams as $team)
                        @if (old('home_club_id') == $team->id)
                            <option selected value="{{ $team->id }}">{{ $team->name }}</option>
                        @else
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label>Thuisploeg</label>
            </div>
            <div class="input-field col s12 m6">
                <select name="away_club_id">
                    <option value="" disabled>Selecteer uitploeg</option>
                    @foreach ($teams as $team)
                        @if (old('away_club_id') == $team->id)
                            <option  selected value="{{ $team->id }}">{{ $team->name }}</option>
                        @else
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label>Uitploeg</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="nog niet gespeeld" id="home_score" name="home_score" type="number"
                    value="{{ old('home_score', '') }}">
                <label for="home_score">Score thuisploeg</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="nog niet gespeeld" id="away_score" name="away_score" type="number"
                    value="{{ old('away_score', '') }}">
                <label for="away_score">Score uitploeg</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="starts_at" name="starts_at" type="datetime-local" value="{{ old('starts_at', '') }}">
                <label for="starts_at" class="active">Tijdstip</label>
            </div>
            <div class="input-field col s12 m6">
                <button class="waves-effect waves-light btn right">Voeg toe</button>
            </div>
        </div>
    </form>
    </div>
@endsection
<script src={{ asset('js/materialize.min.js') }}></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
</body>

</html>
