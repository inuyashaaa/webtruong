<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bomon extends Model
{
    protected $table = 'bo_mon';

    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa', 'id_khoa');
    }

    public function giangvien()
    {
        return $this->hasMany('App\Giangvien', 'id_bo_mon', 'id_bo_mon');
    }

}
