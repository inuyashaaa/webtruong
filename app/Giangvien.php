<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    protected $table = 'giang_vien';

    protected $primaryKey = 'id_giang_vien';

    public function bomon()
    {
        return $this->belongsTo('App\Bomon', 'id_bo_mon', 'id_bo_mon');
    }

    public function phongtn()
    {
        return $this->belongsTo('App\Phongtn', 'id_ptn', 'id_phong_thi_nghiem');
    }

    public function linhvuc()
    {
        return $this->belongsTo('App\Linhvuc', 'id_linh_vuc', 'id_linh_vuc');
    }

    public function huongnghiencuu()
    {
        return $this->hasMany('App\Huongnghiencuu', 'id_giang_vien', 'id_giang_vien');
    }
}
