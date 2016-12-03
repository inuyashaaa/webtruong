<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoahoc extends Model
{
    protected $table = 'khoa_hoc';

    protected $primaryKey = 'id_khoa_hoc';

    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa', 'id_khoa');
    }

    public function sinhvien()
    {
        return $this->hasMany('App\Sinhvien', 'id_khoa_hoc', 'id_nganh_hoc');
    }
}
