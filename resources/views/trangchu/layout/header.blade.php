<!-- Dropdown Structure -->
<ul id="gioithieu" class="dropdown-content">
    <li><a href="cac-bo-mon-va-phong-thi-nghiem.html">Các bộ môn và phòng thí nghệm</a></li>
    <li class="divider"></li>
    <li><a href="giang-vien/danh-sach.html">Giảng viên</a></li>
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
                    <form id="login-form" style="display: block;">
                        <div class="input-field col s12">
                            <input id="username" type="text" name="username">
                            <label for="username">Tên Đăng Nhập Hoặc Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password">
                            <label for="password">Mật Khẩu</label>
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
            <a href="/" class="brand-logo">Uet-Web</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="dropdown-button" href="#" data-activates="gioithieu">Giới thiệu</a></li>
                <li><a class="dropdown-button" href="#" data-activates="khvacn">Khoa học và công nghệ</a></li>
                <li><a href="#">Liên hệ</a></li>
                @if($user = isLogin())
                    <li><a href="<?php
                        if ($user->level == 2) {
                            echo "giang-vien/ho-so-ca-nhan-" . $user->id . ".html";
                        } else
                            if ($user->level == 1) {
                                echo "sinh-vien/ho-so-ca-nhan-" . $user->id . ".html";
                            } else {
                                echo "#";
                            }
                        ?>">Trang cá nhân</a></li>
                    <li><a href="dang-xuat">Đăng xuất</a></li>
                @else
                    <li><a href="#modal1">Đăng nhập</a></li>
                @endif
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