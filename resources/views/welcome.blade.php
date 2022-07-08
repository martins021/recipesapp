<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Welcome</title>
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}">
        
    </head>
    <body>
        <header id="home">
            <nav id="nav">
                <div class="nav-center">
                    <div class="nav-header">
                        <img src="" alt="logo">
                        <button class="nav-toggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    {{-- links --}}
                    <div class="links-container">
                        <ul class="links">
                            <li>
                                <a href="#home" class="scroll-link">Home</a>
                            </li>
                            <li>
                                <a href="#aboutme" class="scroll-link">About me</a>
                            </li>
                            <li>
                                <a href="#newsletter" class="scroll-link">Newsletter</a>
                            </li>
                            <li>
                                <a href="#projects" class="scroll-link">Projects</a>
                            </li>
                            <li>
                                <a href="#recipes" id="recipes-link" class="scroll-link">Recipes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="welcome-background">
                <div class="welcome-div">
                    <h1>Welcome to recipes app!</h1>
                    <a href="/home">
                        Explore our recipes
                    </a>
                </div>
            </div>
        </header>
    </body>
</html>