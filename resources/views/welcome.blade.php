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
        <!-- Styles -->
        <link href="{{ asset('css/welcome.css?v=).time()') }}" rel="stylesheet">
    </head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:wght@700&family=Lobster&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway&family=Ubuntu&display=swap');
html {
  scroll-behavior: smooth;
  font-family: 'Montserrat', sans-serif;
}
body {
  line-height: 1.5;
  margin: 0;
}
ul {
  list-style-type: none;
  color: red;
}
a {
  text-decoration: none;
}
img:not(.logo) {
  width: 100%;
}
img {
  display: block;
}
  nav {

    font-weight: 550;
  }
  .nav-center {
    border: 2px solid white;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    width: 70%; 
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .nav-toggle {
    display: none;
  }
  .links-container {
    height: auto !important;
  }
  .links {
    display: flex;
  }
  #recipes-link {
    background: black;
    border-radius: 5px;
    padding: 1px;
    color: white;
    transition: .4s ease-out;
    text-shadow: none;
  }
  #recipes-link:hover {
    background: white;
    border-radius: 5px;
    padding: 1px;
    color: black;
    transition: .4s ease-out;
    text-shadow: none;
  }
  .links a {
    background: transparent;
    color: white;
    font-size: 20px;
    text-transform: capitalize;
    display: block;
    margin: 0 1rem;
    padding: 0;
    text-shadow: 2px 2px 5px #000000;
    transition: .4s ease-out;
  }
  .links a:hover {
    color: rgb(185, 185, 185);
    transition: .4s ease-out;
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
    header{
        min-height: 100vh;
        background-image: url("https://wallpaperaccess.com/full/1412206.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .welcome-div{
        text-align: center;
        border: 2px solid white;
        background: rgba(255, 255, 255, 0.2);
        width: 60%;
        height: auto;
        margin: 0 auto;
        padding: 30px;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        border-radius: 3px;
    }
    .welcome-div h1{
        font-weight: bold;
        font-size: 45px;
        text-align: center;
        color: white;
        padding: 5px;
    }
    .welcome-div a{
        font-weight: bold;
        font-size: 25px;
        text-align: center;
        color: rgb(0, 0, 0);
        padding: 5px;
        transition: .4s ease-out;
    }
    .welcome-div a:hover{
        font-weight: bold;
        font-size: 30px;
        text-align: center;
        color: rgb(255, 255, 255);
        padding: 10px;
        background: rgb(0, 0, 0);
        border-radius: 3px;
        transition: .4s ease-in;
    }  
    
    #title{
        font-family: 'Ubuntu', sans-serif;
        font-size: 45px;
        text-transform: uppercase;
        grid-column: 1/2;
        grid-row: 1/2;
    }
    .about-container{
        display: grid;
        grid-template-columns: 30% auto;
        grid-template-rows: auto auto auto;
        background: yellow;
        padding: 2% 15% 2% 15%;
    }
    #about-item-image{
        grid-column: 1/2;
        grid-row: 2/4;
    }
    #about-item-text{
        text-align: center;
        font-size: 20px;
    }
    footer {
    width: 100%;
    text-align: center;
    min-height: 180px;
    background: rgb(0, 8, 92);
    color: white;
    text-transform: capitalize;
    font-size: 22px;
    padding-top: 80px;
}
    </style>
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
        
        <footer>
            <p>
              copyright &copy; MM
              <span id="date"></span>. all rights reserved
            </p>
        </footer>
    </body>
</html>