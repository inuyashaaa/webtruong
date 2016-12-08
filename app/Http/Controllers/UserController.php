<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAdminDangnhap()
    {
        return view('admin.layout.login');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [
                'username' => 'bail|required',
                'password' => 'bail|required'
            ],
            [
                'username.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Mật khẩu không được để chống'
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('admin/khoa/danhsach')->with('message', 'Đăng nhập thành công!');
        } else {
            return redirect('dang-nhap')->with('message', 'Sai tên tài khoản hoặc mật khẩu');
        }
    }
}
