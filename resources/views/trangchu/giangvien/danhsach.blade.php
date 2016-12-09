@extends('trangchu.layout.index')
@section('content')
    <nav style="margin-top: 10px;">
        <div class="nav-wrapper light-blue lighten-1">
            <div class="col s12">
                <a href="/" class="breadcrumb">Trang chủ</a>
                <a href="#" class="breadcrumb">Giảng viên</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <table class="bordered highlight tabs-fixed-width">
                    <thead>
                    <tr>
                        <th data-field="id">Họ và Tên</th>
                        <th data-field="name">Đơn vị</th>
                        <th data-field="price">Nghiên cứu</th>
                        <th data-field="price">Email</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($giangvien as $gv)
                        <tr>
                            <td>
                                <a href="giang-vien/thong-tin/{{$gv->id_giang_vien}}-{{$gv->name_khong_dau}}.html ">{{$gv->name}}</a>
                            </td>
                            <td><?php
                                if ($gv->id_bo_mon) {
                                    echo " " . $gv->bomon->name;
                                } else {
                                    if ($gv->id_ptn) {
                                        echo " " . $gv->phongtn->name;
                                    } else {
                                        if ($gv->id_khoa) {
                                            echo $gv->khoa->name;
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                @foreach($hnc as $row)
                                    @if($gv->id_giang_vien == $row->id_giang_vien)
                                        {{$row->name . "." }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$gv->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection