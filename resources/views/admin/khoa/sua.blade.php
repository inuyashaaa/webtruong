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
                <h5>Danh mục khoa</h5>
                <span>Quản lý danh sách khoa</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/khoa/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/khoa/danhsach">
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
        <form class="form" id="form" action="admin/khoa/sua/{{$khoa->id_khoa}}" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Sửa Khoa</h6>
                    </div>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content pd0">
                            <div style="width: 500px;">{{error_validate($errors)}}</div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Mã khoa:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo">
                                        <input name="id_khoa" id="param_name" _autocheck="true" type="text" value="{{$khoa->id_khoa}}">
                                    </span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên khoa:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo">
                                        <input name="name" id="param_name" _autocheck="true" type="text" value="{{$khoa->name}}">
                                    </span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="formSubmit">
                        <input value="Sửa" class="redB" type="submit">
                        <input value="Hủy bỏ" class="basic" type="reset">
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>
@endsection