<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huongnghiencuu extends Model
{
    protected $table = 'huong_nghien_cuu';

    public function giangvien()
    {
        return $this->belongsTo('App\Giangvien', 'id_giang_vien', 'id_giang_vien');
    }

    public function detai(){
        return $this->hasMany('App\Detai', 'id_huong_nghien_cuu', 'id_huong_nghien_cuu');
    }
}
