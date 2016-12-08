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
                    <form action="dang-nhap" method="post" id="login-form" style="display: block;">
                        @if(session('message'))
                            {{session('message')}}
                        @endif
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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