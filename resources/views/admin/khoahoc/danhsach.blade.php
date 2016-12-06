@extends('admin.layout.index')
@section('title')
    {{"Danh sách khóa học"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Khóa học</h5>
                <span>Quản lý danh sách các khóa học</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/khoahoc/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/khoahoc/danhsach">
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
                <h6>Danh sách Khóa học</h6>
                <div class="num f12">Tổng số: <b>{{count($khoahoc)}}</b></div>
            </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">ID</td>
                        <td>Tên</td>
                        <td>Kí hiệu</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>
                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($khoahoc as $kh)
                        <tr>
                            <td><input type="checkbox" name="id_khoa_hoc" value="{{$kh->id_khoa_hoc}}"/></td>
                            <td class="textC">{{$kh->id_khoa_hoc}}</td>
                            <td><span title="{{$kh->name}}" class="tipS">{{$kh->name}}</span></td>
                            <td><span title="{{$kh->ki_hieu}}" class="tipS">{{$kh->ki_hieu}}</span></td>
                            <td class="option">
                                <a href="admin/khoahoc/sua/{{$kh->id_khoa_hoc}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/khoahoc/xoa/{{$kh->id_khoa_hoc}}" title="Xóa" class="tipS verify_action">
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