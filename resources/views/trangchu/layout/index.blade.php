<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Uet-Web</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
    <!-- Dropdown Structure -->
    <ul id="gioithieu" class="dropdown-content">
        <li><a href="#">Các bộ môn và phòng thí nghệm</a></li>
        <li class="divider"></li>
        <li><a href="#">Giảng viên</a></li>
    </ul>

    <ul id="khvacn" class="dropdown-content">
        <li><a href="#">Các hướng nghiên cứu</a></li>
        <li class="divider"></li>
        <li><a href="#">Các đề tài và dự án</a></li>
    </ul>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="col s12">
                    <div class="img-login-form">
                        <img src="images/uet_logo.png" alt="" class="circle responsive-img">
                    </div>
                    <div class="row">
                        <form action="" method="post" id="login-form" style="display: block;">
                            <div class="input-field col s12">
                                <input id="username" type="text" name="username">
                                <label for="username" class="">Tên Đăng Nhập Hoặc Email</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" name="password">
                                <label for="password" class="">Mật Khẩu</label>
                            </div>
                            <div style="text-align: center;">
                                <button class="btn waves-effect green darken-2 hoverable" type="submit" name="action">
                                    Đăng Nhập
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="z-depth-4 light-blue lighten-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Uet-Web</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#" data-activates="gioithieu">Giới thiệu</a></li>
                    <li><a class="dropdown-button" href="#" data-activates="khvacn">Khoa học và công nghệ</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#modal1">Đăng nhập</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Khoa học và công nghệ</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </nav>
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
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">First</div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item">
                                <div>Alvin<a href="#!" class="secondary-content"></a>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div>Alvin<a href="#!" class="secondary-content"></a>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div>Alvin<a href="#!" class="secondary-content"></a>
                                </div>
                            </li>
                            <li class="collection-item">
                                <div>Alvin<a href="#!" class="secondary-content"></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">Second</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
                <li>
                    <div class="collapsible-header">Third</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
            </ul>
            <ul class="collection with-header hoverable">
                <li class="collection-header"><h4>First Names</h4></li>
                <li class="collection-item">
                    <div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                </li>
                <li class="collection-item">
                    <div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                </li>
                <li class="collection-item">
                    <div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                </li>
                <li class="collection-item">
                    <div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div>
                </li>
            </ul>
        </div>
        <div class="col l9 m9 s12">
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
<footer class="page-footer light-blue lighten-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Uet-Web</h5>
                <div class="row valign-wrapper">
                    <div class="col s2"
                    ">
                    <img style="background: white;" src="images/uet_logo.png" alt="" class="circle responsive-img">
                </div>
                <div class="col s10">
                      <span class="white-text">
                        Website là nơi cung cấp tài nguyên học tập,
                        các phương tiện tương tác giữa giảng viên và sinh viên trong hoạt động giảng dạy và học tập.
                        Website được phát triển trên nền tảng Laravel Framework.
                      </span>
                </div>
            </div>
        </div>
        <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Liên hệ</h5>
            <div class="white-text "><i class="tiny material-icons">email</i> Email: <a class="purple-text" href="#">Huymanhtmhp@gmail
                    .com</a></div>
            <div class="white-text"><i class="tiny material-icons">contacts</i> Facebook: <a class="purple-text"
                                                                                             href="https://www.facebook.com/manh.pham.3304673">Mạnh
                    Phạm</a></div>
        </div>
    </div>
    </div>
    <div class="footer-copyright">
        <div class="container" style="text-align: center;">
            © 2016 Copyright TeamTesting
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>