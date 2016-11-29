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
        return $this->hasMany('App\Phongtn')
    }
}
