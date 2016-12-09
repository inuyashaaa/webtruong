@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="giang-vien/danh-sach.html" class="breadcrumb">Giảng viên</a>
                <a href="giang-vien/sua-thong-tin-ca-nhan-{{$giangvien->id_giang_vien}}.html" class="breadcrumb">Sửa
                    thông
                    tin</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5>Sửa thông tin : {{$giangvien->name}}</h5>
                <div class="divider"></div>
                <br>
                <form action="" method="post" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="name" type="text" name="name" value="{{$giangvien->name}}">
                            <label for="name">Họ và tên</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <select name="id_khoa">
                                @foreach($khoa as $kh)
                                    <option
                                            @if($giangvien->id_khoa == $kh->id_khoa){{"selected"}}@endif
                                            value="{{$kh->id_khoa}}">{{$kh->name}}</option>
                                @endforeach
                            </select>
                            <label>Đơn vị</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="email" type="email" name="email" value="{{$giangvien->email}}">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="password" type="password" name="password">
                            <label for="password">Đổi mật khẩu (Nếu cần)</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Cập nhật
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection