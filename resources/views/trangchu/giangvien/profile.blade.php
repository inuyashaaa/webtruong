@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="giang-vien/danh-sach.html" class="breadcrumb">Giảng viên</a>
                <a href="giang-vien/ho-so-ca-nhan-{{$giangvien->id_giang_vien}}.html" class="breadcrumb">Hồ sơ cá
                    nhân</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Trang cá nhân : {{$giangvien->name}}</h5>
                <div class="row">
                    <div class="col s6">
                        <p class="strong">Họ và tên</p>
                        <p>{{$giangvien->name}}</p>
                        <br>
                        <p class="strong">Đơn vị</p>
                        <p><?php
                            if ($giangvien->id_bo_mon) {
                                echo " " . $giangvien->bomon->name;
                            } else {
                                if ($giangvien->id_ptn) {
                                    echo " " . $giangvien->phongtn->name;
                                } else {
                                    if ($giangvien->id_khoa) {
                                        echo $giangvien->khoa->name;
                                    }
                                }
                            }
                            ?></p>
                        <br>
                        <p class="strong">Hướng nghiên cứu</p>

                        @foreach($hnc as $row)
                            @if($giangvien->id_giang_vien == $row->id_giang_vien)
                                <p>
                                    {{$row->name . "." }}
                                    <a href="giang-vien/xoa-huong-nghien-cuu-{{$row->id_huong_nghien_cuu}}">Xóa</a>
                                </p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col s6 center-align">
                        <img class="responsive-img" src="images/avata.png">
                    </div>
                </div>
                <p class="strong">Email</p>
                <p>{{$giangvien->email}}</p>
                <br>
                <a href="giang-vien/sua-thong-tin-ca-nhan-{{$giangvien->id_giang_vien}}.html"
                   class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Sửa thông tin cá
                    nhân</a>
                <a href="giang-vien/dang-ky-huong-ngien-cuu-{{$giangvien->id_giang_vien}}.html"
                   class="waves-effect waves-light btn yellow darken-1"><i class="material-icons left">playlist_add</i>Đăng
                    ký
                    hướng nghiên cứu</a>

                <a href="giang-vien/phe-duyet-de-tai-{{$giangvien->id_giang_vien}}.html"
                   class="waves-effect waves-light btn red"><i class="material-icons left">input</i>Đề tài</a>
            </div>
        </div>
    </div>
@endsection