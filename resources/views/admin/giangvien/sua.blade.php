@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                var main = $('#form');

                // Tabs
                main.contentTabs();
            });
        })(jQuery);
    </script>
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Giảng viên</h5>
                <span>Quản lý danh sách Giảng viên</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/giangvien/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/giangvien/danhsach">
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
        <form class="form" id="form" action="admin/giangvien/sua/{{$giangvien->id_giang_vien}}" method="post"
              enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Sửa giảng viên</h6>
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
                                                    @if($giangvien->id_khoa == $kh->id_khoa)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_khoa}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Phòng thí nghiệm:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <select style="width: 285px;" name="id_phong_thi_nghiem" _autocheck="true"
                                            id="param_cat" class="left">
                                        <option value="0"></option>
                                        @foreach($ptn as $kh)
                                            <option
                                                    @if($giangvien->id_ptn == $kh->id_phong_thi_nghiem)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_phong_thi_nghiem}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Bộ mốn:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select style="width: 285px;" name="id_bo_mon" _autocheck="true" id="param_cat"
                                            class="left">
                                        <option value="0"></option>
                                        @foreach($bomon as $kh)
                                            <option
                                                    @if($giangvien->id_bo_mon == $kh->id_bo_mon)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_bo_mon}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Mã giảng viên:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="id_giang_vien" id="param_name" _autocheck="true"
                                                 type="text" value="{{$giangvien->id_giang_vien}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên giảng viên:<span
                                            class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="name" id="param_name" _autocheck="true" type="text" value="{{$giangvien->name}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="email" id="param_name" _autocheck="true" type="text" value="{{$giangvien->email}}"></span>
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
                                <label class="formLeft" for="param_cat">Chức vụ:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="level" _autocheck="true" id="param_cat" class="left">
                                        <option @if($giangvien->level == 2){{"selected"}} @endif value="2">Giảng viên</option>
                                        <option @if($giangvien->level == 3){{"selected"}} @endif value="3">Chủ nhiệm Khoa</option>
                                        <option @if($giangvien->level == 4){{"selected"}} @endif value="4">Tổ chức cán bộ trường</option>
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formSubmit">
                        <input value="Thêm mới" class="redB" type="submit">
                        <input value="Hủy bỏ" class="basic" type="reset">
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>
@endsection