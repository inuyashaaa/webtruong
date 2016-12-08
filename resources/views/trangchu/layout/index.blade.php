<!DOCTYPE html>
<html>
<head>
    @include('trangchu.layout.head')
</head>
<body>
<header>
    @include('trangchu.layout.header')
</header>
<div class="container slider-wrapper">
    <div class="row">
        <div class="col s12">
            <div class="slider z-depth-4 ">
                <ul class="slides">
                    <li>
                        <img src="images/3.png">
                    </li>
                    <li>
                        <img src="images/tuoitresangtao2.JPG">
                    </li>
                    <li>
                        <img src="images/tuoitresangtao3.JPG">
                    </li>
                    <li>
                        <img src="images/5.JPG">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="divider"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col l3 m3 s12">
            @include('trangchu.layout.menu')
        </div>
        <div class="col l9 m9 s12">
            @yield('content')
            <nav style="margin-top: 10px;">
                <div class="nav-wrapper light-blue lighten-1">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">First</a>
                        <a href="#!" class="breadcrumb">Second</a>
                        <a href="#!" class="breadcrumb">Third</a>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col s12 m5">
                    <div class="card-panel hoverable">
                      <span class="black-text">I am a very simple card. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('trangchu.layout.footer')
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
@yield('script')
</body>
</html>