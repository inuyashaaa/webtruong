<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    protected $table = 'sinh_vien';

    protected $primaryKey = 'id_sinh_vien';

    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'id_khoa', 'id_khoa');
    }

    public function khoahoc()
    {
        return $this->belongsTo('App\Khoahoc', 'id_khoa_hoc', 'id_khoa_hoc');
    }

    public function nganhhoc()
    {
        return $this->belongsTo('App\Nganhhoc', 'id_nganh_hoc', 'id_nganh_hoc');
    }

    public function detai()
    {
        return $this->hasMany('App\Detai', 'id_sv', 'id_sinh_vien');
    }
}
