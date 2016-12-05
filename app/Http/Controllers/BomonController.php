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
        return view('admin.bomon.them', ['khoa' => $khoa]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_bo_mon' => 'bail|required|integer|unique:bo_mon,id_bo_mon',
                'name' => 'bail|required|unique:bo_mon,name|min:4|max:100',
                'mo_ta' => 'required'
            ],
            [
                'id_bo_mon.required' => 'Mã bộ môn không được để trống',
                'id_bo_mon.unique' => 'Mã bộ môn  bạn nhập đã tồn tại',
                'id_bo_mon.integer' => 'Mã bộ môn  bạn nhập phải là kiểu số',
                'name.required' => 'Tên bộ môn  không được để trống',
                'name.unique' => 'Tên bộ môn  đã tồn tại',
                'name.min' => 'Tên bộ môn  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên bộ môn  phải có độ dài từ 4 đến 100 ký tự',
                'mo_ta.required' => 'Mô tả không được để trống'
            ]
        );
        $bomon = new Bomon();
        $bomon->id_bo_mon = $request->id_bo_mon;
        $bomon->name = $request->name;
        $bomon->name_khong_dau = changeTitle($request->name);
        $bomon->mo_ta = $request->mo_ta;
        $bomon->lien_he = $request->lien_he;
        $bomon->id_khoa = $request->id_khoa;
        $bomon->save();
        return redirect('admin/bomon/danhsach')->with('message', 'Thêm bộ môn thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $bomon = Bomon::find($id);
        return view('admin.bomon.sua', ['bomon' => $bomon, 'khoa' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_bo_mon' => 'bail|required|integer',
                'name' => 'bail|required|min:4|max:100',
                'mo_ta' => 'required'
            ],
            [
                'id_bo_mon.required' => 'Mã bộ môn không được để trống',
                'id_bo_mon.integer' => 'Mã bộ môn bạn nhập phải là kiểu số',
                'name.required' => 'Tên bộ môn  không được để trống',
                'name.min' => 'Tên bộ môn  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên bộ môn  phải có độ dài từ 4 đến 100 ký tự',
                'mo_ta.required' => 'Mô tả không được để trống'
            ]
        );
        $bomon = Bomon::find($id);
        $bomon->id_bo_mon = $request->id_bo_mon;
        $bomon->name = $request->name;
        $bomon->name_khong_dau = changeTitle($request->name);
        $bomon->mo_ta = $request->mo_ta;
        $bomon->lien_he = $request->lien_he;
        $bomon->id_khoa = $request->id_khoa;
        $bomon->save();
        return redirect('admin/bomon/danhsach')->with('message', 'Sửa bộ môn thành công');
    }

    public function getXoa($id)
    {
        $bomon = Bomon::find($id);
        $bomon->delete();
        return redirect('admin/bomon/danhsach')->with('message', 'Xóa bộ môn thành công');
    }
}
