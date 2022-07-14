<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/home.css?v=).time()') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/showRecipe.css?v=).time()') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css?v=).time()') }}" rel="stylesheet">

    <style>
        /* HOME */
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
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.open-search{
    width: 100%;
    color: white;
    border: none;
    background-color: blueviolet;
    font-size: 2rem;
    letter-spacing: 2px;
    padding: 0 5% 0 5%;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    transition: 0.3s ease-in;
}
.open-search:hover{
    width: 100%;
    color: white;
    border: none;
    background-color: rgb(76, 0, 148);
    font-size: 2rem;
    letter-spacing: 2px;
    padding: 0 5% 0 5%;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    transition: 0.3s ease-in;
}
#filter-btn:hover{
    background-color: rgb(76, 0, 148);
    transition: 0.3s ease-in;
}
.search{
    display: none;
    background-color: white;
    padding-top: 20px;
    padding-bottom: 20px;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 25px;
}
.search-form{
    text-align: center;
}
input[type=text]{
    padding: 5px;
    display: inline-block;
    border: 1px solid blueviolet;
    border-radius: 4px;
    box-sizing: border-box;
}
select{
    padding: 5px;
    display: inline-block;
    border: 1px solid blueviolet;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit]{
    padding: 5px;
    border: 1px solid blueviolet;
    display: inline-block;
    background: blueviolet;
    color: white;
    border-radius: 4px;
    box-sizing: border-box;
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
    border: 1px solid blueviolet;
    border-radius: 5px;
    cursor: pointer;
    gap: 3px;
    align-items: start;
    transition: all .4s ease;
}
.container-item:hover {
    box-shadow: 5px 5px 10px rgb(138, 43, 226, .3);
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















     /* HOME    FILTER */
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
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    margin-top: 25px;
}
.open-search{
    width: 100%;
    color: white;
    border: none;
    background-color: blueviolet;
    font-size: 2rem;
    letter-spacing: 2px;
    padding: 0 5% 0 5%;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.search-filter{
    display: block;
    background-color: white;
    padding: 20px 5% 20px 5%;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 25px;
}
.search-form{
    text-align: center;
}
.queries p{
    display: inline-block;
    margin-right: 20px;
}
#queryVariable{
    display: inline;
    margin-left: 5px;
    background: blueviolet;
    padding: 2px;
    color: white;
    border-radius: 5px;
}
#clear-filters{
    display: inline;
    float: right;
    margin-left: 5px;
    background: rgb(251, 111, 111);
    padding: 2px;
    color: white;
    border-radius: 5px;
}
input[type=text]{
    padding: 5px;
    display: inline-block;
    border: 1px solid blueviolet;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit]{
    padding: 5px;
    border: 1px solid blueviolet;
    display: inline-block;
    background: blueviolet;
    color: white;
    border-radius: 4px;
    box-sizing: border-box;
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
    border: 1px solid blueviolet;
    border-radius: 5px;
    cursor: pointer;
    gap: 3px;
    align-items: start;
    transition: all .4s ease;
}
.container-item:hover {
    box-shadow: 5px 5px 10px rgb(138, 43, 226, .3);
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

    <script>
        const largeBtn = document.querySelector(".open-search");
        const searchForm = document.querySelector(".search");

        window.addEventListener("DOMContentLoaded", function () {
            searchForm.style.display = "none";
        });

        largeBtn.addEventListener('click', function(){
            console.log(searchForm.style.display); 
            if(searchForm.style.display == "none"){
                searchForm.style.display = "block";
            } else {
                searchForm.style.display = "none";
            }
        });
    </script>
</body>
</html>
