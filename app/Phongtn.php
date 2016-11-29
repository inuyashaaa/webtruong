<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phongtn extends Model
{
    //Chọn bảng phòng thí nghiệm
    protected $table = 'phong_thi_nghiem';

    //Tạo liên kết tới khoa
    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa' , 'id_khoa');
    }

    //Tạo liên kết tới Giảng viên
    public function giangvien(){
        return $this->hasMany('App\Giangvien','id_ptn' , 'id_phong_thi_nghiem');
    }

}
