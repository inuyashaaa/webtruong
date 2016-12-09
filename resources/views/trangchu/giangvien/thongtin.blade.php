@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="giang-vien/danh-sach.html" class="breadcrumb">Giảng viên</a>
                <a href="giang-vien/thong-tin/{{$giangvien->id_giang_vien}}-{{$giangvien->name_khong_dau}}.html"
                   class="breadcrumb">Thông tin giảng viên</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>{{$giangvien->name}}</h5>
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
            </div>
        </div>
    </div>
@endsection