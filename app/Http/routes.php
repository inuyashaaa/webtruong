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

Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix' => 'khoa'],function (){
       Route::get('danhsach','KhoaController@getDanhsach');
       Route::get('them','KhoaController@getThem');
       Route::post('them','KhoaController@postThem');
       Route::get('sua/{id}','KhoaController@getSua');
       Route::post('sua/{id}','KhoaController@postSua');
       Route::get('xoa/{id}','KhoaController@getXoa');
    });

    Route::group(['prefix' => 'bomon'],function (){
        Route::get('danhsach','BomonController@getDanhsach');
        Route::get('them','BomonController@getThem');
        Route::post('them','BomonController@postThem');
        Route::get('sua/{id}','BomonController@getSua');
        Route::post('sua/{id}','BomonController@postSua');
        Route::get('xoa/{id}','BomonController@getXoa');
    });
});