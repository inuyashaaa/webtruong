@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="#" class="breadcrumb">Hướng nghiên cứu</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Hướng nghiên cứu</h5><br>
                <div class="strong">Danh sách các hướng nghiên cứu của giảng viên trong trường:</div>
                <ul>
                    @foreach($hnc as $row)
                        <li>
                            <br>
                            <a href="giang-vien/thong-tin/{{$row->id_giang_vien}}-{{$row->name_khong_dau}}.html ">{{$row->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection