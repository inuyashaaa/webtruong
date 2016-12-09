<?php

namespace App\Http\Controllers;

use App\Bomon;
use App\Giangvien;
use App\Jobs\SendReminderEmail;
use App\Khoa;
use App\Phongtn;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class GiangvienController extends Controller
{
    public function getDanhsach()
    {
        $giangvien = Giangvien::all();
        return view('admin.giangvien.danhsach', ['giangvien' => $giangvien]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        $bomon = Bomon::all();
        $ptn = Phongtn::all();
        return view('admin.giangvien.them', ['khoa' => $khoa, 'bomon' => $bomon, 'ptn' => $ptn]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_giang_vien' => 'bail|required|integer|unique:giang_vien,id_giang_vien',
                'name' => 'required',
                'email' => 'bail|required|unique:giang_vien,email'
            ],
            [
                'id_giang_vien.required' => 'Mã giảng viên không được để trống',
                'id_giang_vien.integer' => 'Mã giảng viên phải là kiểu số nguyên',
                'id_giang_vien.unique' => 'Mã giảng viên đã tồn tại',
                'name.required' => 'Tên giảng viên không được để trống',
                'email.required' => 'Email giảng viên không được để trống',
                'email.unique' => 'Email đã tồn tại'
            ]
        );
        $giangvien = new Giangvien();
        $giangvien->id_khoa = $request->id_khoa;
        if ($request->id_bo_mon != 0) {
            $giangvien->id_bo_mon = $request->id_bo_mon;
        }
        if ($request->id_phong_thi_nghiem != 0) {
            $giangvien->id_ptn = $request->id_phong_thi_nghiem;
        }
        $giangvien->id_giang_vien = $request->id_giang_vien;
        $giangvien->name = $request->name;
        $giangvien->name_khong_dau = changeTitle($request->name);
        $giangvien->email = $request->email;
        $giangvien->level = $request->level;

        //Thêm tài khoản cho giảng viên
        $user = new User();
        $user->id = $giangvien->id_giang_vien;
        $user->name = $giangvien->name;
        $user->username = $giangvien->id_giang_vien;
        $user->password = bcrypt($giangvien->id_giang_vien);
        $user->level = $giangvien->level;
        $user->email = $giangvien->email;
        //Thêm id tài khoản và tạo mới giảng viên
        $giangvien->id_user = $user->id;
        Mail::send('email.index', ['users' => $user], function ($message) use ($giangvien) {
            $message->from('uetmail.web@gmail.com', 'UET-WebMail');
            $message->to($giangvien->email, $giangvien->name)->subject('Thông tin tài khoản!');
        });
        $user->save();
        $giangvien->save();
        return redirect('admin/giangvien/danhsach')->with('message', 'Thêm giảng viên thành công');
    }

    public function getThemfile()
    {
        return view('admin.giangvien.importExcel');
    }

    public function postThemfile()
    {
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['id_giang_vien' => $value->id, 'name' => $value->name, 'donvi' => $value->donvi,
                        'email' => $value->email];
                }
            }
            foreach ($insert as $row) {
                $giangvien = new Giangvien();
                $giangvien->id_khoa = 1;
                $giangvien->id_giang_vien = $row['id_giang_vien'];
                $giangvien->name = $row['name'];
                $giangvien->name_khong_dau = changeTitle($row['name']);
                $giangvien->email = $row['email'];
                $giangvien->level = 2;

                //Thêm tài khoản cho giảng viên
                $user = new User();
                $user->id = $giangvien->id_giang_vien;
                $user->name = $giangvien->name;
                $user->username = $giangvien->id_giang_vien;
                $user->password = bcrypt($giangvien->id_giang_vien);
                $user->level = $giangvien->level;
                $user->email = $giangvien->email;
                //Thêm id tài khoản và tạo mới giảng viên
                $giangvien->id_user = $user->id;
                $gvdt = Giangvien::find($giangvien->id_giang_vien);
                if ($gvdt) {
                    $gvdt->delete();
                }
                $us = User::find($user->id);
                if ($us) {
                    $us->delete();
                }
                //Thiết lập gửi mail
                $user->save();
                $usersendMail = User::findOrFail($giangvien->id_giang_vien);
                $this->dispatch(new SendReminderEmail($usersendMail));
                Giangvien::firstOrCreate($giangvien->toArray());
            }
            return redirect('admin/giangvien/danhsach')->with('message', 'Thêm giảng viên thành công');
        } else {
            return redirect('admin/giangvien/themfile')->with('message', 'Thêm file không thành công');
        }
    }

    public function getSua($id)
    {
        $giangvien = Giangvien::find($id);
        $khoa = Khoa::all();
        $bomon = Bomon::all();
        $ptn = Phongtn::all();
        return view('admin.giangvien.sua', ['khoa' => $khoa, 'bomon' => $bomon, 'ptn' => $ptn, 'giangvien' => $giangvien]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_giang_vien' => 'bail|required|integer',
                'name' => 'required',
                'email' => 'bail|required'
            ],
            [
                'id_giang_vien.required' => 'Mã giảng viên không được để trống',
                'id_giang_vien.integer' => 'Mã giảng viên phải là kiểu số nguyên',
                'name.required' => 'Tên giảng viên không được để trống',
                'email.required' => 'Email giảng viên không được để trống'
            ]
        );
        $giangvien = Giangvien::find($id);
        $giangvien->id_khoa = $request->id_khoa;
        if ($request->id_bo_mon != 0) {
            $giangvien->id_bo_mon = $request->id_bo_mon;
        }
        if ($request->id_phong_thi_nghiem != 0) {
            $giangvien->id_ptn = $request->id_phong_thi_nghiem;
        }
        $giangvien->id_giang_vien = $request->id_giang_vien;
        $giangvien->name = $request->name;
        $giangvien->name_khong_dau = changeTitle($request->name);
        $giangvien->email = $request->email;
        $giangvien->level = $request->level;

        //Thêm tài khoản cho giảng viên
        $user = User::find($id);
        $user->id = $giangvien->id_giang_vien;
        $user->name = $giangvien->name;
        $user->username = $giangvien->id_giang_vien;
        $user->password = bcrypt($giangvien->id_giang_vien);
        $user->level = $giangvien->level;
        $user->email = $giangvien->email;
        //Thêm id tài khoản và tạo mới giảng viên
        $giangvien->id_user = $user->id;
        $user->save();
        $giangvien->save();
        return redirect('admin/giangvien/danhsach')->with('message', 'Sửa giảng viên thành công');

    }

    public function getTaikhoan()
    {
        $taikhoan = User::where('level', 2)->get();
        return view('admin.giangvien.taikhoan', ['taikhoan' => $taikhoan]);
    }

    public function getXoa($id)
    {
        $gv = Giangvien::find($id);
        $user = User::find($gv->users->id);
        $gv->delete();
        $user->delete();
        return redirect('admin/giangvien/danhsach')->with('message', 'Xóa giảng viên thành công!');
    }

    public function getXoahet()
    {
        $gv = Giangvien::all();
        foreach ($gv as $row) {
            $user = User::find($row->users->id);
            $row->delete();
            $user->delete();
        }
        return redirect('admin/giangvien/danhsach')->with('message', 'Xóa giảng viên thành công!');
    }

    /**
     * Thao tác với giảng viên trên trang chủ
     */
    public function getTCdanhsach()
    {
        $giangvien = Giangvien::all();
        return view('trangchu.giangvien.danhsach', ['giangvien' => $giangvien]);
    }

    public function getThongtin($id)
    {
        $giangvien = Giangvien::find($id);
        return view('trangchu.giangvien.thongtin', ['giangvien' => $giangvien]);
    }

    public function getProfile($id)
    {
        $giangvien = Giangvien::find($id);
        return view('trangchu.giangvien.profile', ['giangvien' => $giangvien]);
    }

}
