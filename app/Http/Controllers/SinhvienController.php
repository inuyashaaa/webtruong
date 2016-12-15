<?php

namespace App\Http\Controllers;

use App\Detai;
use App\Huongnghiencuu;
use App\Jobs\SendEmailDetai;
use App\Jobs\SendReminderEmail;
use App\Khoa;
use App\Khoahoc;
use App\Nganhhoc;
use App\Sinhvien;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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
        $sinhvien->name_khong_dau = changeTitle($request->name);
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
        return view('admin.sinhvien.importExcel');
    }

    public function postThemfile()
    {
        $khoahoc = Khoahoc::all();
        $nganhhoc = Nganhhoc::all();
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['id_sinh_vien' => $value->id, 'name' => $value->name, 'khoahoc' => $value->khoahoc,
                        'nganhhoc' => $value->nganhhoc, 'email' => $value->email];
                }
            }
            foreach ($insert as $row) {
                $sinhvien = new Sinhvien();
                $sinhvien->id_khoa = 1;
                $sinhvien->id_sinh_vien = $row['id_sinh_vien'];
                foreach ($khoahoc as $kh) {
                    if ($kh->ki_hieu == $row['khoahoc']) {
                        $sinhvien->id_khoa_hoc = $kh->id_khoa_hoc;
                    }
                }
                foreach ($nganhhoc as $ng) {
                    if ($ng->ki_hieu == $row['nganhhoc']) {
                        $sinhvien->id_nganh_hoc = $ng->id_nganh_hoc;
                    }
                }
                $sinhvien->name = $row['name'];
                $sinhvien->name_khong_dau = changeTitle($row['name']);
                $sinhvien->email = $row['email'];
                $sinhvien->quyen_de_tai = 0;
                $sinhvien->level = 1;

                //Thêm tài khoản cho sinhvien
                $user = new User();
                $user->id = $sinhvien->id_sinh_vien;
                $user->name = $sinhvien->name;
                $user->username = $sinhvien->id_sinh_vien;
                $user->password = bcrypt($sinhvien->id_sinh_vien);
                $user->level = 1;
                $user->email = $sinhvien->email;
                //Thêm id tài khoản và tạo mới giảng viên
                $sinhvien->id_user = $user->id;
                $gvdt = Sinhvien::find($sinhvien->id_sinh_vien);
                if (!$gvdt) {
                    $us = User::find($user->id);
                    if ($us) {
                        $us->delete();
                    }
                    //Thiết lập gửi mail
                    $user->save();
                    $usersendMail = User::findOrFail($sinhvien->id_sinh_vien);
                    $this->dispatch(new SendReminderEmail($usersendMail));
                    $sinhvien->save();
                }
            }
            return redirect('admin/sinhvien/danhsach')->with('message', 'Thêm sinh viên thành công');
        } else {
            return redirect('admin/sinhvien/themfile')->with('message', 'Thêm file không thành công');
        }
    }

    public function getSua($id)
    {
        $sinhvien = Sinhvien::find($id);
        $khoa = Khoa::all();
        $khoahoc = Khoahoc::all();
        $nganhhoc = Nganhhoc::all();
        return view('admin.sinhvien.sua', ['sinhvien' => $sinhvien, 'khoa' => $khoa, 'khoahoc' => $khoahoc, 'nganhhoc' => $nganhhoc]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_sinh_vien' => 'bail|required|integer',
                'name' => 'bail|required',
                'email' => 'bail|required|email'
            ],
            [
                'id_sinh_vien.required' => 'Mã sinh viên không được để trống',
                'id_sinh_vien.integer' => 'Mã sinh viên phải là kiểu số',
                'name.required' => 'Tên sinh viên không được để trống',
                'email.required' => 'Email sinh viên không được để trống',
                'email.email' => 'Bạn không nhập đúng định dạng'
            ]
        );
        // Tạo sinh viên mới
        $sinhvien = Sinhvien::find($id);
        $sinhvien->id_khoa = $request->id_khoa;
        $sinhvien->id_khoa_hoc = $request->id_khoa_hoc;
        $sinhvien->id_nganh_hoc = $request->id_nganh_hoc;
        $sinhvien->id_sinh_vien = $request->id_sinh_vien;
        $sinhvien->name = $request->name;
        $sinhvien->name_khong_dau = changeTitle($request->name);
        $sinhvien->email = $request->email;
        $sinhvien->level = 1;
        $sinhvien->quyen_de_tai = $request->quyen_de_tai;

        //Tạo tài khoản sinh viên
        $user = User::find($id);
        $user->id = $request->id_sinh_vien;
        $user->name = $request->name;
        $user->username = $request->id_sinh_vien;
        $user->password = bcrypt($request->id_sinh_vien);
        $user->level = 1;
        $user->email = $request->email;
        $sinhvien->id_user = $user->id;
        //Thiết lập gửi mail tới Email của sinh viên
        if ($user->id != $id) {
            Mail::send('email.index', ['users' => $user], function ($message) use ($sinhvien) {
                $message->from('uetmail.web@gmail.com', 'UET-WebMail');
                $message->to($sinhvien->email, $sinhvien->name)->subject('Thông tin tài khoản!');
            });
        }
        $user->save();
        $sinhvien->save();
        return redirect('admin/sinhvien/danhsach')->with('message', 'Sửa sinh viên thành công!');
    }

    public function getXoa($id)
    {
        $sinhvien = Sinhvien::find($id);
        User::find($id)->delete();
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

    public function getThemfiledetai()
    {
        return view('admin.sinhvien.importExcel');
    }

    public function postThemfiledetai()
    {
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['id_sinh_vien' => $value->id];
                }
            }
            foreach ($insert as $row) {
                $sinhvien = Sinhvien::find($row['id_sinh_vien']);
                $sinhvien->quyen_de_tai = 1;
                $sinhvien->save();
            }
            return redirect('admin/sinhvien/danhsachlamdetai')->with('message', 'Thêm sinh viên được làm đề tài thành công');
        } else {
            return redirect('admin/sinhvien/themfile')->with('message', 'Thêm file không thành công');
        }
    }

    public function getDanhsachlamdetai()
    {
        $sinhvien = Sinhvien::where('quyen_de_tai', 1)->get();
        return view('admin.sinhvien.danhsachsvdetai', ['sinhvien' => $sinhvien]);
    }

    public function getGuimailquyendetai()
    {
        $sinhvien = Sinhvien::where('quyen_de_tai', 1)->get();
        foreach ($sinhvien as $sv) {
            $usersendMail = User::findOrFail($sv->id_sinh_vien);
            $this->dispatch(new SendEmailDetai($usersendMail));
        }
        return redirect('admin/sinhvien/danhsachlamdetai')->with('message', 'Gửi Mail thông báo quyền đề tài thành công');
    }

    public function getHuyquyendetai($id)
    {
        $sinhvien = Sinhvien::find($id);
        $sinhvien->quyen_de_tai = 0;
        $sinhvien->save();
        return redirect('admin/sinhvien/danhsachlamdetai')->with('message', 'Hủy quyền được làm đề tài của sinh viên thành công');
    }

    /**
     * Các thao tác của sinh viên trên trang chủ
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        $sinhvien = Sinhvien::find($id);
        return view('trangchu.sinhvien.profile', ['sinhvien' => $sinhvien]);
    }

    public function getDangkydetai($id)
    {
        $sinhvien = Sinhvien::find($id);
        $hnc = Huongnghiencuu::all();
        return view('trangchu.sinhvien.dangkydetai', ['sinhvien' => $sinhvien, 'hnc' => $hnc]);
    }

    public function getQuanlydetai($id)
    {
        $sinhvien = Sinhvien::find($id);
        $detai = Detai::all();
        return view('trangchu.sinhvien.detai', ['sinhvien' => $sinhvien, 'detai' => $detai]);
    }
}
