@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Bộ môn</h5>
                <span>Quản lý danh sách các bộ môn</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/bomon/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a></li>

                    <li><a href="admin/bomon/danhsach">
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
                        <h6>Danh sách Bộ môn</h6>
                        <div class="num f12">Tổng số: <b>{{count($bomon)}}</b></div>
                    </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">Mã bộ môn</td>
                        <td>Tên</td>
                        <td>Khoa</td>
                        <td>Hình ảnh</td>
                        <td>Liên hệ</td>
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
                    @foreach($bomon as $bm)
                        <tr>
                            <td><input type="checkbox" name="id_khoa" value="{{$bm->id_bo_mon}}"/></td>
                            <td class="textC">{{$bm->id_bo_mon}}</td>
                            <td><span title="{{$bm->name}}" class="tipS">{{$bm->name}}</span></td>
                            <td><span title="{{$bm->khoa->name}}" class="tipS">{{$bm->khoa->name}}</span></td>
                            <td><span title="{{$bm->hinh_anh}}" class="tipS"><img src="#" alt="{{$bm->hinh_anh}}"></span></td>
                            <td><span title="{{$bm->lien_he}}" class="tipS">{{$bm->lien_he}}</span></td>
                            <td class="option">
                                <a href="admin/bomon/sua/{{$bm->id_bo_mon}}" title="Chỉnh sửa" class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/bomon/xoa/{{$bm->id_bo_mon}}" title="Xóa" class="tipS verify_action">
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