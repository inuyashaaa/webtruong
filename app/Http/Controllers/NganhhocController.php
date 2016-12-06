<?php

namespace App\Http\Controllers;

use App\Nganhhoc;
use Illuminate\Http\Request;

use App\Http\Requests;

class NganhhocController extends Controller
{
    public function getDanhsach()
    {
        $nganhhoc = Nganhhoc::all();
        return view('admin.nganhhoc.danhsach', ['nganhhoc' => $nganhhoc]);
    }

    public function getThem()
    {
        return view('admin.nganhhoc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'bail|required|unique:nganh_hoc,name',
                'ki_hieu' => 'bail|required|unique:nganh_hoc,ki_hieu'
            ],
            [
                'name.required' => 'Tên ngành học không được để trống',
                'name.unique' => 'ngành học đã tồn tại',
                'ki_hieu.required' => 'Ký hiệu ngành học không để trống',
                'ki_hieu.unique' => 'Ký hiệu ngành học đã được sử dụng'
            ]
        );
        $nganhhoc = new Nganhhoc();
        $nganhhoc->name = $request->name;
        $nganhhoc->name_khong_dau = changeTitle($request->name);
        $nganhhoc->ki_hieu = $request->ki_hieu;
        $nganhhoc->save();
        return redirect('admin/nganhhoc/danhsach')->with('message', 'Thêm ngành học thành công');
    }

    public function getSua($id)
    {
        $nganhhoc = Nganhhoc::find($id);
        return view('admin/nganhhoc/sua', ['nganhhoc' => $nganhhoc]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'bail|required',
                'ki_hieu' => 'bail|required'
            ],
            [
                'name.required' => 'Tên ngành học không được để trống',
                'ki_hieu.required' => 'Ký hiệu ngành học không để trống'
            ]
        );
        $nganhhoc = Nganhhoc::find($id);
        $nganhhoc->name = $request->name;
        $nganhhoc->name_khong_dau = changeTitle($request->name);
        $nganhhoc->ki_hieu = $request->ki_hieu;
        $nganhhoc->save();
        return redirect('admin/nganhhoc/danhsach')->with('message', 'Sửa ngành học thành công');
    }

    public function getXoa($id)
    {
        $kh = Nganhhoc::find($id);
        $kh->delete();
        return redirect('admin/nganhhoc/danhsach')->with('message', 'Xóa ngành học thành công');
    }
}
