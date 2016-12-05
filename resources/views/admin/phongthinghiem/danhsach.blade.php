@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Phòng thí nghiệm</h5>
                <span>Quản lý danh sách các phòng thí nghiệm</span>
            </div>
            <div class="horControlB menu_action">
                <ul>
                    <li>
                        <a href="admin/phongtn/them">
                            <img src="admin_asset/images/icons/control/16/add.png"/>
                            <span>Thêm mới</span>
                        </a>
                    </li>

                    <li>
                        <a href="admin/phongtn/danhsach">
                            <img src="admin_asset/images/icons/control/16/list.png"/>
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
        {{message_success()}}
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"/></span>
                <h6>Danh sách Phòng thí nghiệm</h6>
                <div class="num f12">Tổng số: <b>{{count($phongtn)}}</b></div>
            </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">Mã phòng thí nghiệm</td>
                        <td>Tên</td>
                        <td>Khoa</td>
                        {{--<td>Hình ảnh</td>--}}
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
                    @foreach($phongtn as $ptn)
                        <tr>
                            <td><input type="checkbox" name="id_khoa" value="{{$ptn->id_phong_thi_nghiem}}"/></td>
                            <td class="textC">{{$ptn->id_phong_thi_nghiem}}</td>
                            <td><span title="{{$ptn->name}}" class="tipS">{{$ptn->name}}</span></td>
                            <td><span title="{{$ptn->khoa->name}}" class="tipS">{{$ptn->khoa->name}}</span></td>
                            {{--<td><span title="{{$bm->hinh_anh}}" class="tipS"><img src="#" alt="{{$bm->hinh_anh}}"></span></td>--}}
                            <td><span title="{{$ptn->lien_he}}" class="tipS">{{$ptn->lien_he}}</span></td>
                            <td class="option">
                                <a href="admin/phongtn/sua/{{$ptn->id_phong_thi_nghiem}}" title="Chỉnh sửa"
                                   class="tipS ">
                                    <img src="admin_asset/images/icons/color/edit.png"/>
                                </a>
                                <a href="admin/phongtn/xoa/{{$ptn->id_phong_thi_nghiem}}" title="Xóa"
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