<?php

Route::get('/', function () {
    return view('trangchu.trangchu');
});

// Route đăng nhâp, đăng xuất admin
Route::get('admin', 'UserController@getAdminDangnhap');
Route::post('admin', 'UserController@postAdminDangnhap');
Route::get('admin/dangxuat', 'UserController@getAdminDangxuat');

//Tạo route group admin
Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    /**
     * Tạo route group quản lý khoa
     */
    Route::group(['prefix' => 'khoa'], function () {
        Route::get('danhsach', 'KhoaController@getDanhsach');
        Route::get('them', 'KhoaController@getThem');
        Route::post('them', 'KhoaController@postThem');
        Route::get('sua/{id}', 'KhoaController@getSua');
        Route::post('sua/{id}', 'KhoaController@postSua');
        Route::get('xoa/{id}', 'KhoaController@getXoa');
    });
    /**
     * Tạo route group quản lý các bộ môn
     */
    Route::group(['prefix' => 'bomon'], function () {
        Route::get('danhsach', 'BomonController@getDanhsach');
        Route::get('them', 'BomonController@getThem');
        Route::post('them', 'BomonController@postThem');
        Route::get('sua/{id}', 'BomonController@getSua');
        Route::post('sua/{id}', 'BomonController@postSua');
        Route::get('xoa/{id}', 'BomonController@getXoa');
    });
    /**
     * Tạo route group quản lý các phòng thí nghiệm
     */
    Route::group(['prefix' => 'phongtn'], function () {
        Route::get('danhsach', 'PhongtnController@getDanhsach');
        Route::get('them', 'PhongtnController@getThem');
        Route::post('them', 'PhongtnController@postThem');
        Route::get('sua/{id}', 'PhongtnController@getSua');
        Route::post('sua/{id}', 'PhongtnController@postSua');
        Route::get('xoa/{id}', 'PhongtnController@getXoa');
    });
    /**
     * Tạo route group quản lý các văn phòng khoa
     */
    Route::group(['prefix' => 'vpk'], function () {
        Route::get('danhsach', 'VpkController@getDanhsach');
        Route::get('them', 'VpkController@getThem');
        Route::post('them', 'VpkController@postThem');
        Route::get('sua/{id}', 'VpkController@getSua');
        Route::post('sua/{id}', 'VpkController@postSua');
        Route::get('xoa/{id}', 'VpkController@getXoa');
    });
    /**
     * Tạo route group quản lý các giảng viên
     */
    Route::group(['prefix' => 'giangvien'], function () {
        Route::get('danhsach', 'GiangvienController@getDanhsach');
        Route::get('them', 'GiangvienController@getThem');
        Route::post('them', 'GiangvienController@postThem');
        Route::get('themfile', 'GiangvienController@getThemfile');
        Route::post('themfile', 'GiangvienController@postThemfile');
        Route::get('sua/{id}', 'GiangvienController@getSua');
        Route::post('sua/{id}', 'GiangvienController@postSua');
        Route::get('xoa/{id}', 'GiangvienController@getXoa');
        Route::get('xoahet', 'GiangvienController@getXoahet');
        Route::get('taikhoan', 'GiangvienController@getTaikhoan');
    });
    /**
     * Tạo route group quản lý các Sinh viên
     */
    Route::group(['prefix' => 'sinhvien'], function () {
        Route::get('danhsach', 'SinhvienController@getDanhsach');
        Route::get('them', 'SinhvienController@getThem');
        Route::post('them', 'SinhvienController@postThem');
        Route::get('themfile', 'SinhvienController@getThemfile');
        Route::post('themfile', 'SinhvienController@postThemfile');
        Route::get('sua/{id}', 'SinhvienController@getSua');
        Route::post('sua/{id}', 'SinhvienController@postSua');
        Route::get('xoa/{id}', 'SinhvienController@getXoa');
        Route::get('xoahet', 'SinhvienController@getXoahet');
        Route::get('themfiledetai', 'SinhvienController@getThemfiledetai');
        Route::post('themfiledetai', 'SinhvienController@postThemfiledetai');
        Route::get('danhsachlamdetai', 'SinhvienController@getDanhsachlamdetai');
        Route::get('gui-mail-quyen-de-tai.html', 'SinhvienController@getGuimailquyendetai');
        Route::get('huyquyendetai/{id}', 'SinhvienController@getHuyquyendetai');

    });
    /**
     * Tạo route group quản lý các khóa học
     */
    Route::group(['prefix' => 'khoahoc'], function () {
        Route::get('danhsach', 'KhoahocController@getDanhsach');
        Route::get('them', 'KhoahocController@getThem');
        Route::post('them', 'KhoahocController@postThem');
        Route::get('sua/{id}', 'KhoahocController@getSua');
        Route::post('sua/{id}', 'KhoahocController@postSua');
        Route::get('xoa/{id}', 'KhoahocController@getXoa');
    });
    /**
     * Tạo route group quản lý các ngành học
     */
    Route::group(['prefix' => 'nganhhoc'], function () {
        Route::get('danhsach', 'NganhhocController@getDanhsach');
        Route::get('them', 'NganhhocController@getThem');
        Route::post('them', 'NganhhocController@postThem');
        Route::get('sua/{id}', 'NganhhocController@getSua');
        Route::post('sua/{id}', 'NganhhocController@postSua');
        Route::get('xoa/{id}', 'NganhhocController@getXoa');
    });
    /**
     * Tạo route group quản lý đề tài
     */
    Route::group(['prefix' => 'detai'], function () {
        Route::get('chopheduyet', 'DetaiController@getChopheduyet');
        Route::get('duocchapnhan', 'DetaiController@getDuocchapnhan');
        Route::get('chapnhan/{id}', 'DetaiController@getChapnhan');
        Route::get('xoa/{id}', 'DetaiController@getXoadetai');
        Route::get('rutdangky', 'DetaiController@getRutdangky');
        Route::get('guimailbaove', 'DetaiController@getGuimailbaove');
        Route::get('xuatdanhsach', 'DetaiController@getXuatdanhsach');
    });
});

Route::group(['prefix' => 'giang-vien'], function () {
    Route::get('danh-sach.html', 'GiangvienController@getTCdanhsach');
    Route::get('thong-tin/{id}-{name}.html', 'GiangvienController@getThongtin');
    Route::get('ho-so-ca-nhan-{id}.html', 'GiangvienController@getProfile');
    Route::get('dang-ky-huong-ngien-cuu-{id}.html', 'GiangvienController@getDangkyHcn');
    Route::post('dang-ky-huong-ngien-cuu-{id}.html', 'GiangvienController@postDangkyHcn');
    Route::get('xoa-huong-nghien-cuu-{id}', 'GiangvienController@xoaHnc');
    Route::get('sua-thong-tin-ca-nhan-{id}.html', 'GiangvienController@getSuathongtin');
    Route::post('sua-thong-tin-ca-nhan-{id}.html', 'GiangvienController@postSuathongtin');
    Route::get('phe-duyet-de-tai-{id}.html', 'GiangvienController@getPheduyetdetai');
    Route::get('de-tai-duoc-chap-nhan-{id}.html', 'GiangvienController@getChapnhandetai');
    Route::get('de-tai-khong-duoc-chap-nhan-{id}.html', 'GiangvienController@getKhongchapnhandetai');
});

Route::post('dang-nhap', [
    'as' => 'login',
    'uses' => 'UserController@postDangnhap'
]);
Route::get('dang-xuat', [
    'as' => 'logout',
    'uses' => 'UserController@getDangxuat'
]);
Route::get('cac-bo-mon-va-phong-thi-nghiem.html', 'SiteController@getDanhsachbomon');
Route::get('bo-mon/{id}-{name}.html', 'SiteController@getBomon');
Route::get('phong-thi-nghiem/{id}-{name}.html', 'SiteController@getPhongtn');
Route::get('huong-nghien-cuu.html', 'SiteController@getHuongnghiencuu');
Route::get('sinh-vien/ho-so-ca-nhan-{id}.html', 'SinhvienController@getProfile');
Route::get('sinh-vien/quan-ly-de-tai-{id}.html', 'SinhvienController@getQuanlydetai');
Route::get('sinh-vien/dang-ly-de-tai-{id}.html', 'SinhvienController@getDangkydetai');
Route::post('sinh-vien/dang-ly-de-tai-{id}.html', 'SinhvienController@postDangkydetai');
Route::get('sinh-vien/xin-huy-de-tai-{id}.html', 'SinhvienController@getXinhuydetai');
Route::get('sinh-vien/sua-thong-tin-de-tai-{id}.html', 'SinhvienController@getSuathongtindetai');
Route::post('sinh-vien/sua-thong-tin-de-tai-{id}.html', 'SinhvienController@postSuathongtindetai');

