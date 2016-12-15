@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="sinh-vien/ho-so-ca-nhan-{{$sinhvien->id_sinh_vien}}.html" class="breadcrumb">Hồ sơ cá
                    nhân</a>
                <a href="#" class="breadcrumb">Đề tài</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Quản lý đề tài : {{$sinhvien->name}}</h5>
                <a href="sinh-vien/sua-thong-tin-ca-nhan-{{$sinhvien->id_sinh_vien}}.html"
                   class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Xin sửa đổi đề
                    tài</a>
                @if($sinhvien->quyen_de_tai == 1)
                    <a href="sinh-vien/dang-ly-de-tai-{{$sinhvien->id_sinh_vien}}.html"
                       class="waves-effect waves-light btn yellow darken-1"><i
                                class="material-icons left">playlist_add</i>Đăng ký đề tài</a>
                @endif
            </div>
        </div>
    </div>
@endsection