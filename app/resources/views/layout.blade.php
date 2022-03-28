@section('header')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Eerste klasse A</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href={{ asset("css/materialize.min.css")}}>
    </head>

    <body class="container">
        <div class="row">
            <div class="col s12">
                <nav class="teal lighten-2 nav-extended ">
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">&nbsp;&nbsp;Wedstrijdkalender</a>
                    </div>
                    <div class="nav-content">
                        <ul class="tabs tabs-transparent">
                            <li class="tab"><a class="active" href="{{ url('competitions/1') }}">Eerste klasse A</a>
                            </li>
                            <li class="tab"><a  href="{{ url('competitions/2') }}">Nepcompetitie</a></li>
                        </ul>
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light amber darken-2"
                            href="{{ url('games/add') }}">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </nav>
            </div>
        @show
        @section('content')

        @show
        @section('footer')
            <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

    </html>
@show
