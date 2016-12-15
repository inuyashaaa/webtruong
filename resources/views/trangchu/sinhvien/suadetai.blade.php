@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="sinh-vien/ho-so-ca-nhan-{{$sinhvien->id_sinh_vien}}.html" class="breadcrumb">Hồ sơ cá
                    nhân</a>
                <a href="sinh-vien/quan-ly-de-tai-{{$sinhvien->id_sinh_vien}}.html" class="breadcrumb">Đề tài</a>
                <a href="#" class="breadcrumb">Sửa đề tài</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Sửa đề tài : {{$sinhvien->name}}</h5>
                <div class="divider"></div>
                <br>
                <form action="" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="row">
                        <div class="input-field col s8">
                            <select name="id_hnc">
                                @foreach($hnc as $row)
                                    <option
                                            @if($row->id_huong_nghien_cuu == $detai->id_huong_nghien_cuu)
                                            {{"selected"}}
                                            @endif
                                            value="{{$row->id_huong_nghien_cuu}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                            <label>Hướng nghiên cứu</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" value="{{$detai->name}}">
                            <label for="name">Tên đề tài</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <div>Nội dung</div>
                            <textarea id="demo" name="noi_dung" class="ckeditor">{!! $detai->noi_dung  !!}</textarea>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light green" type="submit" name="action">Sửa đề tài
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection