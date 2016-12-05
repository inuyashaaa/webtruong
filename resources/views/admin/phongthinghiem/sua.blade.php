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
                <h5>Danh mục Phòng thí nghiệm</h5>
                <span>Quản lý danh sách các Phòng thí nghiệm</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/phongtn/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/phongtn/danhsach">
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
        <form class="form" id="form" action="admin/phongtn/sua/{{$phongtn->id_phong_thi_nghiem}}" method="post"
              enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Thêm mới Phòng thí nghiệm</h6>
                    </div>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content pd0">
                            {{error_validate($errors)}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Khoa:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="id_khoa" _autocheck="true" id="param_cat" class="left">
                                        @foreach($khoa as $kh)
                                            <option
                                                    @if($phongtn->khoa->id_khoa == $kh->id_khoa)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_khoa}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Mã Phòng thí nghiệm:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="id_phong_thi_nghiem" id="param_name" _autocheck="true"
                                                 type="text" value="{{$phongtn->id_phong_thi_nghiem}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên Phòng thí nghiệm:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="name" id="param_name" _autocheck="true" type="text"
                                                 value="{{$phongtn->name}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_sale">Mô tả:</label>
                                <div class="formRight">
                                    <span><textarea name="mo_ta" id="demo"
                                                    class="ckeditor">{{$phongtn->mo_ta}}</textarea></span>
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