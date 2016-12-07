@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Sinh viên</h5>
                <span>Quản lý danh sách sinh viên</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/sinhvien/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/sinhvien/danhsach">
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
                <h6>Danh sách Sinh viên</h6>
                <div class="num f12">Tổng số: <b>{{count($sinhvien)}}</b></div>
            </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">Mã sinh viên</td>
                        <td>Họ và Tên</td>
                        <td>Khoa</td>
                        <td>Khóa học-Ngành học</td>
                        <td>Email</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="admin/sinhvien/xoahet" class="button blueB">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>
                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($sinhvien as $sv)
                        <tr>
                            <td><input type="checkbox" name="id_khoa" value="{{$sv->id_sinh_vien}}"/></td>
                            <td class="textC">{{$sv->id_sinh_vien}}</td>
                            <td><span title="{{$sv->name}}" class="tipS">{{$sv->name}}</span></td>
                            <td><span title="{{$sv->khoa->name}}" class="tipS">{{$sv->khoa->name}}</span></td>
                            <td><span title="{{$sv->khoahoc->ki_hieu ."-".$sv->nganhhoc->name}}"
                                      class="tipS">{{$sv->khoahoc->ki_hieu ."-".$sv->nganhhoc->name}}</span></td>
                            <td><span title="{{$sv->email}}" class="tipS">{{$sv->email}}</span></td>
                            <td class="option">
                                <a href="admin/sinhvien/sua/{{$sv->id_sinh_vien}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/sinhvien/xoa/{{$sv->id_sinh_vien}}" title="Xóa"
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