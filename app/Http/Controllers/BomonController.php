<?php

namespace App\Http\Controllers;

use App\Bomon;
use App\Khoa;
use Illuminate\Http\Request;

use App\Http\Requests;

class BomonController extends Controller
{
    public function getDanhsach()
    {
        $bomon = Bomon::all();
        $khoa = Khoa::all();
        return view('admin.bomon.danhsach', ['bomon' => $bomon, 'khoa' => $khoa]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.bomon.them',['khoa' => $khoa]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [

            ],
            [

            ]
        );

    }

    public function getSua($id)
    {

    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [

            ],
            [

            ]
        );

    }

    public function getXoa($id)
    {

    }
}
