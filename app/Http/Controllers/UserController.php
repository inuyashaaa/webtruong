<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Đăng nhập và đăng xuất Admin
     */
    public function getAdminDangnhap()
    {
        return view('admin.layout.login');
    }

    public function postAdminDangnhap(Request $request)
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
            return redirect('admin')->with('message', 'Sai tên tài khoản hoặc mật khẩu');
        }
    }

    public function getAdminDangxuat()
    {
        Auth::logout();
        return redirect('admin');
    }

    public function postDangnhap(Requests\LoginRequest $request)
    {
        $input = $request->all();
        $check = filter_var($input['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$check => $input['username'], 'password' => $input['password']])) {
            return response([
                'success' => 1
            ]);
        }

        return response('', 500);
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('/');
    }
}
