@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                var main = $('#form');
                main.contentTabs();
            });
        })(jQuery);
    </script>
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Sinh viên</h5>
                <span>Quản lý danh sách Sinh viên</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/sinhvien/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/sinhvien/danhsach">
                            <img src="admin_asset/images/icons/control/16/list.png">
                            <span>Danh sách</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>

    <div class="wrapper">
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Sửa thông tin Sinh viên</h6>
                    </div>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content pd0">
                            {{error_validate($errors)}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Khoa:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select style="width: 285px;" name="id_khoa" _autocheck="true" id="param_cat"
                                            class="left">
                                        @foreach($khoa as $kh)
                                            <option
                                                    @if($kh->id_khoa == $sinhvien->id_khoa)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_khoa}}">{{$kh->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Khóa học:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <select style="width: 285px;" name="id_khoa_hoc" _autocheck="true"
                                            id="param_cat" class="left">
                                        <option value="0"></option>
                                        @foreach($khoahoc as $kh)
                                            <option
                                                    @if($kh->id_khoa_hoc == $sinhvien->id_khoa_hoc)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_khoa_hoc}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Chương trình đào tạo:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select style="width: 285px;" name="id_nganh_hoc" _autocheck="true" id="param_cat"
                                            class="left">
                                        <option value="0"></option>
                                        @foreach($nganhhoc as $kh)
                                            <option
                                                    @if($kh->id_nganh_hoc == $sinhvien->id_nganh_hoc)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_nganh_hoc}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Mã Sinh viên:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <span>
                                        <input name="id_sinh_vien" id="param_name" _autocheck="true" type="text"
                                               value="{{$sinhvien->id_sinh_vien}}">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên Sinh viên:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="name" id="param_name" _autocheck="true" type="text"
                                                 value="{{$sinhvien->name}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="email" id="param_name" _autocheck="true" type="text"
                                                 value="{{$sinhvien->email}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                <div class="formRight">
                                    <div class="left"><input type="file" id="image" name="hinh_anh"></div>
                                    <div name="image_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Quyền làm đề tài:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <select name="quyen_de_tai" _autocheck="true" id="param_cat" class="left">
                                        <option value="0">Chưa được làm đề tài</option>
                                        <option value="1">Được phép làm đề tài</option>
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formSubmit">
                        <input value="Cập nhật" class="redB" type="submit">
                        <input value="Hủy bỏ" class="basic" type="reset">
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>
@endsection