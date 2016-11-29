<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanphongkhoa extends Model
{
    protected $table = "vpk";

    //Tạo liên kết tới khoa
    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa', 'id_khoa');
    }
}
