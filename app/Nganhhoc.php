<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nganhhoc extends Model
{
    protected $table = 'nganh_hoc';

    protected $primaryKey = 'id_nganh_hoc';

    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa', 'id_khoa');
    }

    public function sinhvien()
    {
        return $this->hasMany('App\Sinhvien','id_nganh_hoc', 'id_nganh_hoc');
    }
}
