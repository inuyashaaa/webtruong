@extends('admin.layout.index')
@section('title')
    {{"Danh sách chương trình đào tạo"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Ngành học</h5>
                <span>Quản lý danh sách các ngành học</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/nganhhoc/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/nganhhoc/danhsach">
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
                <h6>Danh sách chương trình đào tạo</h6>
                <div class="num f12">Tổng số: <b>{{count($nganhhoc)}}</b></div>
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
                    @foreach($nganhhoc as $nh)
                        <tr>
                            <td><input type="checkbox" name="id_khoa_hoc" value="{{$nh->id_nganh_hoc}}"/></td>
                            <td class="textC">{{$nh->id_nganh_hoc}}</td>
                            <td><span title="{{$nh->name}}" class="tipS">{{$nh->name}}</span></td>
                            <td><span title="{{$nh->ki_hieu}}" class="tipS">{{$nh->ki_hieu}}</span></td>
                            <td class="option">
                                <a href="admin/nganhhoc/sua/{{$nh->id_nganh_hoc}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/nganhhoc/xoa/{{$nh->id_nganh_hoc}}" title="Xóa" class="tipS verify_action">
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