@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="cac-bo-mon-va-phong-thi-nghiem.html" class="breadcrumb">Bộ môn và PTN</a>
                <a href="#" class="breadcrumb">{{$phongtn->name}}</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>{{$phongtn->name}}</h5><br>
                <p>{!! $phongtn->mo_ta !!}</p><br><br>
                <div class="strong">Giảng viên thuộc phòng thí nghiệm</div>
                <br>
                @foreach($giangvien as $gv)
                    @if($gv->id_ptn == $phongtn->id_phong_thi_nghiem)
                        <a href="giang-vien/thong-tin/{{$gv->id_giang_vien}}-{{$gv->name_khong_dau}}.html ">{{$gv->name}}</a>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection