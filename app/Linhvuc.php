<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linhvuc extends Model
{
    protected $table = 'linh_vuc';

    protected $primaryKey = 'id_linh_vuc';

    public function giangvien()
    {
        return $this->hasMany('App\Giangvien', 'id_linh_vuc', 'id_linh_vuc');
    }
}
