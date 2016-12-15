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
        <div class="col l9 m9 s12">
            @yield('content')
        </div>
        <div class="col l3 m3 s12">
            @include('trangchu.layout.menu')
        </div>
    </div>
</div>
@include('trangchu.layout.footer')
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        $('#login-form').submit(function (e) {
            e.preventDefault();
            var data = getFormData($(this));
            data['_token'] = '{{csrf_token()}}';
            $.ajax({
                url: "{{route('login')}}",
                method: "POST",
                dataType: "json",
                data: data,
                success: function (rs) {
                    toastr.success('Đăng Nhập thành công.');
                    window.location = '/';
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        var rs = xhr.responseJSON;
                        showValidation(rs);
                    } else {
                        toastr.error('Sai tài khoản hoặc mật khẩu');
                    }
                }
            })
        });
    });

</script>
@yield('script')
</body>
</html>