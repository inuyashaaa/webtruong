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
                @if($sinhvien->quyen_de_tai == 1)
                    @if($sinhvien->detai)
                        <div class="divider"></div>
                        <h5>Đề tài: {{$sinhvien->detai->name}}</h5>
                        <div>Hướng nghiên cứu: <b>{{$sinhvien->detai->huongnghiencuu->name}}</b></div>
                        <div>Giảng viên phụ trách: <b>{{$sinhvien->detai->huongnghiencuu->giangvien->name}}</b></div>
                        <div>Nội dung đề tài:</div>
                        <br>
                        <div>
                            {!! $sinhvien->detai->noi_dung !!}
                        </div>
                        <br><br>
                        <a href="sinh-vien/sua-thong-tin-de-tai-{{$sinhvien->detai->id_de_tai}}.html"
                           class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Xin sửa đổi
                            đề
                            tài</a>
                        <a href="sinh-vien/xin-huy-de-tai-{{$sinhvien->detai->id_de_tai}}.html"
                           class="waves-effect waves-light btn red"><i class="material-icons left">not_interested</i>Xin
                            hủy đề
                            tài</a>
                    @else
                        <a href="sinh-vien/dang-ly-de-tai-{{$sinhvien->id_sinh_vien}}.html"
                           class="waves-effect waves-light btn yellow darken-1"><i
                                    class="material-icons left">playlist_add</i>Đăng ký đề tài</a>
                    @endif
                @else
                    <a href="#"
                       class="waves-effect waves-light btn"><i class="material-icons left">info</i>Bạn chưa đủ điều
                        kiện làm đề tài</a>
                @endif
            </div>
        </div>
    </div>
@endsection