<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Vanphongkhoa;
use Illuminate\Http\Request;

use App\Http\Requests;

class VpkController extends Controller
{
    public function getDanhsach()
    {
        $vpk = Vanphongkhoa::all();
        return view('admin.vanphongkhoa.danhsach', ['vpk' => $vpk]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.vanphongkhoa.them', ['khoa' => $khoa]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_vpk' => 'bail|required|integer|unique:vpk,id_vpk',
                'name' => 'bail|required|unique:vpk,name|min:4|max:100'
            ],
            [
                'id_vpk.required' => 'Mã văn phòng khoa không được để trống',
                'id_vpk.unique' => 'Mã văn phòng khoa  bạn nhập đã tồn tại',
                'id_vpk.integer' => 'Mã văn phòng khoa  bạn nhập phải là kiểu số',
                'name.required' => 'Tên văn phòng khoa  không được để trống',
                'name.unique' => 'Tên văn phòng khoa  đã tồn tại',
                'name.min' => 'Tên văn phòng khoa  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên văn phòng khoa  phải có độ dài từ 4 đến 100 ký tự'
            ]
        );
        $vpk = new Vanphongkhoa();
        $vpk->id_vpk = $request->id_vpk;
        $vpk->name = $request->name;
        $vpk->name_khong_dau = changeTitle($request->name);
        $vpk->id_khoa = $request->id_khoa;
        $vpk->save();
        return redirect('admin/vpk/danhsach')->with('message', 'Thêm văn phòng khoa thành công!');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $vpk = Vanphongkhoa::find($id);
        return view('admin.vanphongkhoa.sua', ['vpk' => $vpk, 'khoa' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_vpk' => 'bail|required|integer',
                'name' => 'bail|required|min:4|max:100'
            ],
            [
                'id_vpk.required' => 'Mã văn phòng khoa không được để trống',
                'id_vpk.integer' => 'Mã văn phòng khoa  bạn nhập phải là kiểu số',
                'name.required' => 'Tên văn phòng khoa  không được để trống',
                'name.min' => 'Tên văn phòng khoa  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên văn phòng khoa  phải có độ dài từ 4 đến 100 ký tự'
            ]
        );
        $vpk = Vanphongkhoa::find($id);
        $vpk->id_vpk = $request->id_vpk;
        $vpk->name = $request->name;
        $vpk->name_khong_dau = changeTitle($request->name);
        $vpk->id_khoa = $request->id_khoa;
        $vpk->save();
        return redirect('admin/vpk/danhsach')->with('message', 'Sửa văn phòng khoa thành công!');

    }

    public function getXoa($id)
    {
        $vpk = Vanphongkhoa::find($id);
        $vpk->delete();
        return redirect('admin/vpk/danhsach')->with('message', 'Xóa văn phòng khoa thành công');
    }
}
