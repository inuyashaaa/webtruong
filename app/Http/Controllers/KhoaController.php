<?php

namespace App\Http\Controllers;

use App\Khoa;
use Illuminate\Http\Request;

use App\Http\Requests;

class KhoaController extends Controller
{
    public function getDanhsachKhoa()
    {
        $khoa = Khoa::all();
        return view('admin.layout.index',['khoa' => $khoa]);
    }
}
