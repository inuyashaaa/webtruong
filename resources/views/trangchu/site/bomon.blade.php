@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="#" class="breadcrumb">Các bộ môn và phòng thí nghiệm</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Các bộ môn và phòng thí nghiệm</h5><br>
                @foreach($bomon as $bm)
                    <a href="bo-mon/{{$bm->id_bo_mon}}-{{$bm->name_khong_dau}}.html">{{$bm->name}}</a><br><br>
                @endforeach

                @foreach($phongtn as $ptn)
                    <a href="phong-thi-nghiem/{{$ptn->id_phong_thi_nghiem}}-{{$ptn->name_khong_dau}}.html">{{$ptn->name}}</a>
                    <br><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection