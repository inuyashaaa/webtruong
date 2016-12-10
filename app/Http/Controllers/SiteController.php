<?php

namespace App\Http\Controllers;

use App\Bomon;
use App\Giangvien;
use App\Huongnghiencuu;
use App\Phongtn;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{
    public function getDanhsachbomon()
    {
        $bomon = Bomon::all();
        $phongtn = Phongtn::all();
        return view('trangchu.site.bomon', ['bomon' => $bomon, 'phongtn' => $phongtn]);
    }

    public function getBomon($id)
    {
        $bomon = Bomon::find($id);
        $giangvien = Giangvien::all();
        return view('trangchu.site.chitietbomon', ['bomon' => $bomon, 'giangvien' => $giangvien]);
    }

    public function getPhongtn($id)
    {
        $phongtn = Phongtn::find($id);
        $giangvien = Giangvien::all();
        return view('trangchu.site.chitietphongtn', ['phongtn' => $phongtn, 'giangvien' => $giangvien]);
    }

    public function getHuongnghiencuu()
    {
        $hnc = Huongnghiencuu::all();
        return view('trangchu.site.huongnc', ['hnc' => $hnc]);
    }
}
