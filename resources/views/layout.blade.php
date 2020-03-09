
<!DOCTYPE html>
<body>
<head>
    <title>CS:GO</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:700&display=swap" rel="stylesheet">
</head>
<div class="container-fluid">
    <div class="topBar col-12">
        <div id="loginInfo" class="col-12">
            <div class="row">
                @if(Auth::user())
                <div style="text-align:center;border-right: 2px solid rgba(0,0,0,0.1);" class="col-2">
                    <a href="/profile">Profile</a>
                </div>
                @endif
                <div style="text-align:center;border-right: 2px solid rgba(0,0,0,0.1);" class="col-2">
                    <a href="/">Cases</a>
                </div>
                <div style="text-align:center;border-right: 2px solid rgba(0,0,0,0.1);" class="col-2">
                    <a href="/items">Items</a>
                </div>
                @if(!Auth::user())
                    <div style="text-align:center;border-right: 2px solid rgba(0,0,0,0.1);" class="col-2">
                        <a href="/auth/steam">| Zaloguj ze steam |</a>
                    </div>
            @endif


            </div>
        </div>
    </div>
    <div id="content" class="col-10 offset-1">
        @yield('content')
    </div>
</div>
</body>
</html>
