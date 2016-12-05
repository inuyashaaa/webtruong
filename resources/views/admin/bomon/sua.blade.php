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
                <h5>Danh mục Bộ môn</h5>
                <span>Quản lý danh sách các Bộ môn</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/bomon/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/bomon/danhsach">
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
        <form class="form" id="form" action="admin/bomon/sua/{{$bomon->id_bo_mon}}" method="post"
              enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Thêm mới bộ môn</h6>
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
                                                    @if($kh->id_khoa == $bomon->khoa->id_khoa)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$kh->id_khoa}}">{{$kh->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Mã bộ môn:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="id_bo_mon" id="param_name" _autocheck="true" type="text"
                                                 value="{{$bomon->id_bo_mon}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên bộ môn:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="name" id="param_name" _autocheck="true" type="text"
                                                 value="{{$bomon->name}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_sale">Mô tả:</label>
                                <div class="formRight">
                                    <span><textarea name="mo_ta" id="demo" class="ckeditor">{{$bomon->mo_ta}}</textarea></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                <div class="formRight">
                                    <div class="left"><input type="file" id="image"
                                                             name="hinh_anh">{!! $bomon->hinh_anh !!}
                                    </div>
                                    <div name="image_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_sale">Liên hệ:</label>
                                <div class="formRight">
                                    <span><textarea name="lien_he" id="param_sale" rows="4"
                                                    cols="">{!! $bomon->lien_he !!}</textarea></span>
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