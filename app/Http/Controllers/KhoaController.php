<?php

namespace App\Http\Controllers;

use App\Khoa;
use Illuminate\Http\Request;

use App\Http\Requests;

class KhoaController extends Controller
{
    public function getDanhsach()
    {
        $khoa = Khoa::all();
        return view('admin.khoa.danhsach', ['khoa' => $khoa]);
    }

    public function getThem()
    {
        return view('admin.khoa.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_khoa' => 'bail|required|integer|unique:Khoa,id_khoa',
                'name' => 'bail|required|unique:Khoa,name|min:4|max:100'
            ],
            [
                'id_khoa.required' => 'Mã khoa không được để trống',
                'id_khoa.unique' => 'Mã khoa bạn nhập đã tồn tại',
                'id_khoa.integer' => 'Mã khoa bạn nhập phải là kiểu số',
                'name.required' => 'Tên khoa không được để trống',
                'name.unique' => 'Tên khoa đã tồn tại',
                'name.min' => 'Tên khoa phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên khoa phải có độ dài từ 4 đến 100 ký tự'
            ]
        );
        $khoa = new Khoa();
        $khoa->id_khoa = $request->id_khoa;
        $khoa->name = $request->name;
        $khoa->name_khong_dau = changeTitle($request->name);
        $khoa->save();
        return redirect('admin/khoa/danhsach')->with('message', 'Thêm khoa thành công');
    }

    public function getSua($id)
    {
        $khoa = Khoa::find($id);
        return view('admin.khoa.sua', ['khoa' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_khoa' => 'bail|required|integer',
                'name' => 'bail|required|min:4|max:100'
            ],
            [
                'id_khoa.required' => 'Mã khoa không được để trống',
                'id_khoa.integer' => 'Mã khoa bạn nhập phải là kiểu số',
                'name.required' => 'Tên khoa không được để trống',
                'name.min' => 'Tên khoa phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên khoa phải có độ dài từ 4 đến 100 ký tự'
            ]
        );
        $khoa = Khoa::find($id);
        $khoa->id_khoa = $request->id_khoa;
        $khoa->name = $request->name;
        $khoa->name_khong_dau = changeTitle($request->name);
        $khoa->save();
        return redirect('admin/khoa/danhsach')->with('message', 'Sửa thành công!');
    }

    public function getXoa($id)
    {
        $khoa = Khoa::find($id);
        $khoa->delete();
        return redirect('admin/khoa/danhsach')->with('message', 'Xóa thành công!');
    }
}
