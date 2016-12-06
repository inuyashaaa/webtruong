<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Khoahoc;
use Illuminate\Http\Request;

use App\Http\Requests;

class KhoahocController extends Controller
{
    public function getDanhsach()
    {
        $khoahoc = Khoahoc::all();
        return view('admin.khoahoc.danhsach', ['khoahoc' => $khoahoc]);
    }

    public function getThem()
    {
        return view('admin.khoahoc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'bail|required|unique:khoa_hoc,name',
                'ki_hieu' => 'bail|required|unique:khoa_hoc,ki_hieu'
            ],
            [
                'name.required' => 'Tên khóa học không được để trống',
                'name.unique' => 'Khóa học đã tồn tại',
                'ki_hieu.required' => 'Ký hiệu khóa học không để trống',
                'ki_hieu.unique' => 'Ký hiệu khóa học đã được sử dụng'
            ]
        );
        $khoahoc = new Khoahoc();
        $khoahoc->name = $request->name;
        $khoahoc->ki_hieu = $request->ki_hieu;
        $khoahoc->save();
        return redirect('admin/khoahoc/danhsach')->with('message', 'Thêm khóa học thành công');
    }

    public function getSua($id)
    {
        $khoahoc = Khoahoc::find($id);
        return view('admin/khoahoc/sua', ['khoahoc' => $khoahoc]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'bail|required',
                'ki_hieu' => 'bail|required'
            ],
            [
                'name.required' => 'Tên khóa học không được để trống',
                'ki_hieu.required' => 'Ký hiệu khóa học không để trống'
            ]
        );
        $khoahoc = Khoahoc::find($id);
        $khoahoc->name = $request->name;
        $khoahoc->ki_hieu = $request->ki_hieu;
        $khoahoc->save();
        return redirect('admin/khoahoc/danhsach')->with('message', 'Sửa khóa học thành công');
    }

    public function getXoa($id)
    {
        $kh = Khoahoc::find($id);
        $kh->delete();
        return redirect('admin/khoahoc/danhsach')->with('message', 'Xóa khóa học thành công');
    }
}
