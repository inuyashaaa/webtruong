<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('email', 'EmailController@sendMail');
//Tạo route group admin
Route::group(['prefix' => 'admin'], function () {
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
});