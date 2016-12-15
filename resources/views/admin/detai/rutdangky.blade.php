@extends('admin.layout.index')
@section('title')
    {{"Quản trị trang web"}}
@endsection
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục Đề tài</h5>
                <span>Danh sách đề tài xin hủy</span>
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
                <h6>Danh sách Đề tài xin hủy</h6>
                <div class="num f12">Tổng số: <b>{{count($detai)}}</b></div>
            </div>
            <form action="" method="get" class="form" name="filter">
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck"
                       id="checkAll">
                    <thead>
                    <tr>
                        <td style="width:10px;"><img src="admin_asset/images/icons/tableArrows.png"/></td>
                        <td style="width:80px;">Tên đề tài</td>
                        <td>Hướng nghiên cứu</td>
                        <td>Giảng viên phụ trách</td>
                        <td>Nội Dung</td>
                        <td style="width:100px;">Hành động</td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions">
                                <a href="#" class="button blueB">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>
                            <div class='pagination'>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($detai as $dt)
                        @if($dt->hd_chap_nhan != 1)
                            <tr>
                                <td><input type="checkbox" name="id_khoa" value="{{$dt->name}}"/></td>
                                <td class="textC">{{$dt->name}}</td>
                                <td><span title="{{$dt->huongnghiencuu->name}}"
                                          class="tipS">{{$dt->huongnghiencuu->name}}</span></td>
                                <td><span title="{{$dt->huongnghiencuu->giangvien->name}}"
                                          class="tipS">{{$dt->huongnghiencuu->giangvien->name}}</span></td>
                                <td><span class="tipS">{!! $dt->noi_dung !!}</span></td>
                                <td class="option">
                                    <a href="admin/detai/xoa/{{$dt->id_de_tai}}" title="Hủy đề tài"
                                       class="tipS verify_action">
                                        <img src="admin_asset/images/icons/color/delete.png"/>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection