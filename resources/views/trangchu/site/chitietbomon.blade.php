@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="cac-bo-mon-va-phong-thi-nghiem.html" class="breadcrumb">Bộ môn và PTN</a>
                <a href="#" class="breadcrumb">{{$bomon->name}}</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>{{$bomon->name}}</h5><br>
                <p>{!! $bomon->mo_ta !!}</p><br><br>
                <div class="strong">Giảng viên thuộc bộ môn</div>
                @foreach($giangvien as $gv)
                    @if($gv->id_bo_mon == $bomon->id_bo_mon)
                        <br>
                        <a href="giang-vien/thong-tin/{{$gv->id_giang_vien}}-{{$gv->name_khong_dau}}.html ">{{$gv->name}}</a>
                    @endif
                @endforeach
                <br><br>
                <div class="strong">Liên hệ</div>
                <br>
                <div>{{$bomon->lien_he}}</div>
            </div>

        </div>
    </div>
@endsection