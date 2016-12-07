<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Khoahoc;
use App\Nganhhoc;
use App\Sinhvien;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class SinhvienController extends Controller
{
    public function getDanhsach()
    {
        $sinhvien = Sinhvien::all();
        return view('admin.sinhvien.danhsach', ['sinhvien' => $sinhvien]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        $khoahoc = Khoahoc::all();
        $nganhhoc = Nganhhoc::all();
        return view('admin.sinhvien.them', ['khoa' => $khoa, 'khoahoc' => $khoahoc, 'nganhhoc' => $nganhhoc]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_sinh_vien' => 'bail|required|integer|unique:sinh_vien,id_sinh_vien',
                'name' => 'bail|required|unique:sinh_vien,name',
                'email' => 'bail|required|email|unique:sinh_vien,email'
            ],
            [
                'id_sinh_vien.required' => 'Mã sinh viên không được để trống',
                'id_sinh_vien.integer' => 'Mã sinh viên phải là kiểu số',
                'id_sinh_vien.unique' => 'Mã sinh viên đã tồn tại',
                'name.required' => 'Tên sinh viên không được để trống',
                'name.uinque' => 'Tên sinh viên đã tồn tại',
                'email.required' => 'Email sinh viên không được để trống',
                'email.email' => 'Bạn không nhập đúng định dạng',
                'email.unique' => 'Email sinh viên đã tồn tại',
            ]
        );
        // Tạo sinh viên mới
        $sinhvien = new Sinhvien();
        $sinhvien->id_khoa = $request->id_khoa;
        $sinhvien->id_khoa_hoc = $request->id_khoa_hoc;
        $sinhvien->id_nganh_hoc = $request->id_nganh_hoc;
        $sinhvien->id_sinh_vien = $request->id_sinh_vien;
        $sinhvien->name = $request->name;
        $sinhvien->email = $request->email;
        $sinhvien->level = 1;
        $sinhvien->quyen_de_tai = $request->quyen_de_tai;

        //Tạo tài khoản sinh viên
        $user = new User();
        $user->id = $request->id_sinh_vien;
        $user->name = $request->name;
        $user->username = $request->id_sinh_vien;
        $user->password = bcrypt($request->id_sinh_vien);
        $user->level = 1;
        $user->email = $request->email;
        $sinhvien->id_user = $user->id;
        //Thiết lập gửi mail tới Email của sinh viên
        Mail::send('email.index', ['users' => $user], function ($message) use ($sinhvien) {
            $message->from('uetmail.web@gmail.com', 'UET-WebMail');
            $message->to($sinhvien->email, $sinhvien->name)->subject('Thông tin tài khoản!');
        });
        $user->save();
        $sinhvien->save();
        return redirect('admin/sinhvien/danhsach')->with('message', 'Thêm sinh viên thành công!');
    }

    public function getThemfile()
    {

    }

    public function postThemfile()
    {

    }

    public function getSua($id)
    {
    }

    public function postSua(Request $request, $id)
    {

    }

    public function getXoa($id)
    {
        $sinhvien = Sinhvien::find($id);
        $sinhvien->delete();
        return redirect('admin/sinhvien/danhsach')->with('message', 'Xóa sinh viên thành công!');
    }

    public function getXoahet()
    {
        $sv = Sinhvien::all();
        foreach ($sv as $row) {
            $user = User::find($row->users->id);
            $row->delete();
            $user->delete();
        }
        return redirect('admin/sinhvien/danhsach')->with('message', 'Xóa sinh viên thành công!');
    }
}
