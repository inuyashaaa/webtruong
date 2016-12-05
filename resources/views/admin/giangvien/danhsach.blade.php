@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục giảng viên</h5>
                <span>Quản lý danh sách giảng viên</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/giangvien/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/giangvien/danhsach">
                            <img src="admin_asset/images/icons/control/16/list.png"/>
                            <span>Danh sách</span>
                        </a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>

    <div class="wrapper">
        {{message_success()}}
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                <h6>Danh sách Giảng viên</h6>
                <div class="num f12">Tổng số: <b>{{count($giangvien)}}</b></div>
            </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">Mã giảng viên</td>
                        <td>Tên</td>
                        <td>Đơn vị</td>
                        <td>Email</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="admin/giangvien/xoahet"  class="button blueB">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>
                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($giangvien as $gv)
                        <tr>
                            <td><input type="checkbox" name="id_khoa" value="{{$gv->id_giang_vien}}"/></td>
                            <td class="textC">{{$gv->id_giang_vien}}</td>
                            <td><span title="{{$gv->name}}" class="tipS">{{$gv->name}}</span></td>
                            <td><span title="{{$gv->khoa->name}}" class="tipS">{{$gv->khoa->name}}</span></td>
                            <td><span title="{{$gv->email}}" class="tipS">{{$gv->email}}</span></td>
                            <td class="option">
                                <a href="admin/giangvien/sua/{{$gv->id_giang_vien}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/giangvien/xoa/{{$gv->id_giang_vien}}" title="Xóa"
                                   class="tipS verify_action">
                                    <img src="admin_asset/images/icons/color/delete.png"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection