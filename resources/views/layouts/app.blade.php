<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/showRecipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/homeFilter.css') }}" rel="stylesheet">
</head>
<style>
    html, body {
        height: 100%;
    }

    .wrapper {
        min-height: 100%;
        margin-bottom: -100px;
        padding-bottom: 100px;
    }

    .nav-link{
        background: blueviolet;
        border-radius: 5px;
        padding: 2px 5px 2px 5px;
        margin-left: 10px;
        font-weight: bold;
        color: white;
        transition: .4s ease-out;
        border: 1px solid black;
    }

    .nav-link:hover{
        background: white;
        border-radius: 5px;
        padding: 2px;
        padding-right: 5px;
        padding-left: 5px;
        color: blueviolet;
        transition: .4s ease-out;
        text-shadow: none;
        border: 1px solid black;
    }

    footer {
        width: 100%;
        text-align: center;
        background: blueviolet;
        color: white;
        text-transform: capitalize;
        font-size: 20px;
    }
    .footer-text{
        height: 100px;
        line-height: 100px;
    }
</style>

<body>  
    <div class="wrapper">
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Recipes
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <footer>
        <div class="footer-text">
          copyright &copy; MM
          <span id="date"></span>. all rights reserved
        </div>
    </footer>

    <script>
        const date = document.querySelector("#date");
        date.innerHTML = new Date().getFullYear();
    </script>

</body>
</html>
