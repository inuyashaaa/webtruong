<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detai extends Model
{
    protected $table = 'de_tai';

    public function sinhvien()
    {
        return $this->belongsTo('App\Sinhvien', 'id_sv', 'id_sinh_vien');
    }

    public function huongnghiencuu()
    {
        return $this->belongsTo('App\Huongnghiencuu','id_huong_nghien_cuu', 'id_huong_nghien_cuu');
    }
}
