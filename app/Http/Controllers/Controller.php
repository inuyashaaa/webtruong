<?php

namespace App\Http\Controllers;

use App\Khoa;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->login();
//        $this->danhsachkhoa();
    }

    public function login()
    {
        if (Auth::check()) {
            view()->share('user_login', Auth::user());
        }
    }

//    public function danhsachkhoa()
//    {
//        $khoa = Khoa::all();
//        view()->share('danhsachkhoa', $khoa);
//    }
}
