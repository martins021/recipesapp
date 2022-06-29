<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/welcome.css">

<style>
body{
    padding-right: 15%;
    padding-left: 15%;
}
a {
  text-decoration: none; /* no underline */
  color: inherit;
}
h1{
    color: blueviolet;
}
.background{
    background-color: white;
    padding-top: 20px;
    padding-bottom: 20px;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);;
}
.container-recipes {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-evenly;
  gap: 20px 30px;
}
.container-item {
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    grid-template-rows: 25% 25% 25% 25%;
    width: 400px;
    height: 200px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    gap: 3px;
    align-items: start;
    transition: all .4s ease;
}
.container-item:hover {
    box-shadow: 5px 5px 10px rgb(0, 0, 0, .3);
    color: black;
    -webkit-transform: scale(1.02);
    -ms-transform: scale(1.02);
    transform: scale(1.02);
}
.container-item img{
    width: 200px;
    height: 150px;
    object-fit: cover;
}
.recipe-photo{
    grid-column: 1/3;
    grid-row: 1/4;
}
.recipe-photo img{
    border-radius: 5px;
}
.recipe-title{
    grid-column: 3/5;
    grid-row: 1/2;
    text-align: center;
    padding-left: 2px;
    padding-right: 2px;
    font-size: 22px;
}
.recipe-description{
    grid-column: 3/5;
    grid-row: 2/3;
    padding-left: 5px;
    padding-right: 5px;
    font-size: 15px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* number of lines to show */
            line-clamp: 2; 
    -webkit-box-orient: vertical;
}
.recipe-prepTime{
    grid-column: 3/5;
    grid-row: 3/4;
    padding-left: 5px;
    padding-right: 5px;
}
.recipe-likes{
    grid-column: 1/2;
    grid-row: 4/5;
    padding-left: 5px;
    padding-right: 5px;
}
.like-form{
    grid-column: 2/3;
    grid-row: 4/5;
}
.recipe-edit{
    grid-column: 3/4;
    grid-row: 4/5;
}
.recipe-delete{
    grid-column: 4/5;
    grid-row: 4/5;
}
.form-add-new-recipe{
    float: left;
    margin-right: 20px;
    margin-left: 20px;
}
.form-create-new-recipe{
    float: left;
}


.show-container{
    border: 1px solid black;
    border-radius: 15px;
    padding-bottom: 20px;
    margin-bottom: 20px;
}
.show-container > img{
    border-radius: 15px;
}
.show-container > h3{
    padding-left: 15px;
    padding-right: 15px;
}
.show-container > p{
    padding-left: 15px;
    padding-right: 15px;
    font-size: 17px;
}
.show-container > span{
    padding-left: 15px;
    padding-right: 15px;
    font-size: 17px;
}
.comment-container{
    border: 1px solid black;
    border-radius: 15px;
    padding-bottom: 20px;
    padding: 20px;
}
.write-comment{
    padding-bottom: 20px;
}
</style>    

</head>
<body>  
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
</body>
</html>
