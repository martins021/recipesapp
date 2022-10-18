<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="public\css\welcome.css">
        <!-- Styles -->
        <link href="{{ asset('css/welcome.css?v=).time()') }}" rel="stylesheet">
    </head>
    <body>
        <header id="home">
            <div class="welcome-background">
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
                                    <a href="/home" id="recipes-link" class="scroll-link">Recipes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="welcome-div">
                    <h1>Welcome</h1>
                </div>
            </div>
        </header>

        <section id="aboutme" class="section">
            <div class="about-container">
                <div class="about-item" id="title">About me</div>
                <div class="about-item" id="about-item-image">Image</div>
                <div class="about-item" id="about-item-text"><strong>Text1</strong></div>
                <div class="about-item" id="about-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam amet quibusdam sunt quae quia dolores cupiditate, quas tempore dolorem? Fugiat, quas. At odio porro esse laudantium vero, cupiditate optio ullam eveniet placeat temporibus sunt rem excepturi earum iste fuga aut ipsum quas veritatis molestiae aperiam asperiores dicta itaque. Natus dignissimos adipisci nulla consequatur eaque perspiciatis, architecto eius sint doloribus rem vitae dolore tempora corrupti molestias, ratione fugit laudantium odio. Cum ea accusamus facilis iure facere, saepe maiores laboriosam dolor similique tempora nesciunt possimus voluptate, quo amet ullam rem dolore enim vel laudantium voluptatem? Laboriosam iste cumque nam enim optio tenetur?</div>
                <div class="about-item" id="about-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aspernatur quisquam maxime reprehenderit a repudiandae, sint eum porro itaque ut.</div>
            </div>
        </section>

        <section id="newsletter" class="section">
            <div id="title">
                <h2>Newsletter</h2>
            </div>
        </section>

        <section id="projects" class="section">
            <div id="title">
                <h2>Ongoing projects</h2>
            </div>
        </section>
        

    </body>
</html>