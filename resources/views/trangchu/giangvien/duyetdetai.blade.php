@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="giang-vien/danh-sach.html" class="breadcrumb">Giảng viên</a>
                <a href="giang-vien/ho-so-ca-nhan-{{$giangvien->id_giang_vien}}.html" class="breadcrumb">Hồ sơ cá
                    nhân</a>
                <a href="#" class="breadcrumb">Duyệt đề tài</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Danh sách đề tài cần duyệt</h5>
                <div class="row">
                    <div class="col s12">
                        <ul class="collapsible" data-collapsible="accordion">
                            @foreach($detai as $dt)
                                @if($dt->huongnghiencuu->id_giang_vien == $giangvien->id_giang_vien && $dt->gv_chap_nhan == 0)
                                    <li>
                                        <div class="collapsible-header">{{$dt->name}}
                                        </div>
                                        <div class="collapsible-body">
                                            <p>{!! $dt->noi_dung !!}</p>
                                            <div class="center-align">
                                                <a href="giang-vien/de-tai-duoc-chap-nhan-{{$dt->id_de_tai}}.html"
                                                   class="waves-effect waves-light btn"><i
                                                            class="material-icons left">done</i>Chấp nhận đề
                                                    tài</a>
                                            </div>
                                        </div>

                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="divider"></div>
                <h5>Danh sách đề tài đã phê duyệt</h5>
                <div class="row">
                    <div class="col s12">
                        <ul class="collapsible" data-collapsible="accordion">
                            @foreach($detai as $dt)
                                @if($dt->huongnghiencuu->id_giang_vien == $giangvien->id_giang_vien && $dt->gv_chap_nhan == 1)
                                    <li>
                                        <div class="collapsible-header">{{$dt->name}}
                                        </div>
                                        <div class="collapsible-body">
                                            <p>{!! $dt->noi_dung !!}</p>
                                            <div class="center-align">
                                                <a href="giang-vien/de-tai-khong-duoc-chap-nhan-{{$dt->id_de_tai}}.html"
                                                   class="waves-effect waves-light btn red"><i
                                                            class="material-icons left">delete</i>Hủy chấp nhận đề
                                                    tài</a>
                                            </div>
                                        </div>

                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection