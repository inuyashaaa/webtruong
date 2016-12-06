@extends('admin.layout.index')
@section('title')
    {{"Sửa khóa học"}}
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
                <h5>Danh mục Khóa học</h5>
                <span>Quản lý danh sách các khóa học</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/khoahoc/them">
                            <img src="admin_asset/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                    <li>
                        <a href="admin/khoahoc/danhsach">
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
        <form class="form" id="form" action="admin/khoahoc/sua/{{$khoahoc->id_khoa_hoc}}" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="admin_asset/images/icons/dark/add.png" class="titleIcon">
                        <h6>Sửa khóa học</h6>
                    </div>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content pd0">
                            {{error_validate($errors)}}
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên khóa học:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="name" id="param_name" _autocheck="true" type="text" value="{{$khoahoc->name}}"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Ký hiệu:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span><input name="ki_hieu" id="param_name" _autocheck="true" type="text" value="{{$khoahoc->ki_hieu}}"></span>
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