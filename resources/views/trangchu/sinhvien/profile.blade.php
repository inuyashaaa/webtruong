@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="#" class="breadcrumb">Hồ sơ cá
                    nhân</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Trang cá nhân : {{$sinhvien->name}}</h5>
                <div class="row">
                    <div class="col s6">
                        <p class="strong">Họ và tên</p>
                        <p>{{$sinhvien->name}}</p>
                        <br>
                        <p class="strong">Khóa</p>
                        <p>{{$sinhvien->khoahoc->name}}</p>
                        <br>
                        <p class="strong">Chương trình đào tạo</p>
                        <p>{{$sinhvien->nganhhoc->name}}</p
                        <br>
                    </div>
                    <div class="col s6 center-align">
                        <img class="responsive-img" src="images/avata.png">
                    </div>
                </div>
                <p class="strong">Email</p>
                <p>{{$sinhvien->email}}</p>
                <br>
                <a href="sinh-vien/sua-thong-tin-ca-nhan-{{$sinhvien->id_sinh_vien}}.html"
                   class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Sửa thông tin cá
                    nhân</a>
                @if($sinhvien->quyen_de_tai == 1)
                    <a href="sinh-vien/quan-ly-de-tai-{{$sinhvien->id_sinh_vien}}.html"
                       class="waves-effect waves-light btn yellow darken-1"><i
                                class="material-icons left">playlist_add</i>Quản lý đề tài</a>
                @endif
            </div>
        </div>
    </div>
@endsection