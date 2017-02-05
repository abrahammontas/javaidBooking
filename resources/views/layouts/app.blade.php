<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src:url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/fonts/glyphicons-halflings-regular.eot');
            src:url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),
            url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/fonts/glyphicons-halflings-regular.woff') format('woff'),
            url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/fonts/glyphicons-halflings-regular.ttf') format('truetype'),
            url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        }
    </style>

    <link rel="stylesheet" href="/css/themes/bootstrap-stars.css">

    <link href="/css/jquery.timepicker.css" rel="stylesheet" media="screen">


    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Hotels <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/hotel/create') }}"><i class=""></i>Add</a></li>
                                    <li><a href="{{ url('/hotel') }}"><i class=""></i> List</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Cities <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/city/create') }}"><i class=""></i>Add</a></li>
                                    <li><a href="{{ url('/city') }}"><i class=""></i> List</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    States <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/state/create') }}"><i class=""></i>Add</a></li>
                                    <li><a href="{{ url('/state') }}"><i class=""></i> List</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


</body>
</html>
