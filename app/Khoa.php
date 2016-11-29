<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    //Khai báo bảng mà Model truy xuất tới
    protected $table = 'khoa';

    //Tạo liên kết tới Model vpk
    public function vpk()
    {
        return $this->hasMany('App\Vanphongkhoa', 'id_khoa', 'id_khoa');
    }

    //tạo liên kết tới Model Phòng thí nghiệm
    public function phongtn()
    {
        return $this->hasMany('App\Phongtn', 'id_khoa', 'id_khoa');
    }

    //Tạo liên kết tới bộ môn
    public function bomon()
    {
        return $this->hasMany('App\Bomon', 'id_khoa', 'id_khoa');
    }

    //Tạo liên kết tới bảng Sinh viên
    public function sinhvien()
    {
        return $this->hasMany('App\Sinhvien', 'id_khoa', 'id_khoa');
    }

    //Tạo liên kết tới Ngành học
    public function nganhhoc()
    {
        return $this->hasMany('App\Nganhhoc', 'id_khoa', 'id_khoa');
    }

    //Tạo liên kết tới khóa học
    public function khoahoc()
    {
        return $this->hasMany('App\Khoahoc', 'id_khoa', 'id_khoa');
    }
}
