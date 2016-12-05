<?php

namespace App\Http\Controllers;

use App\Khoa;
use App\Phongtn;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhongtnController extends Controller
{
    public function getDanhsach()
    {
        $phongtn = Phongtn::all();
        return view('admin.phongthinghiem.danhsach', ['phongtn' => $phongtn]);
    }

    public function getThem()
    {
        $khoa = Khoa::all();
        return view('admin.phongthinghiem.them', ['khoa' => $khoa]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'id_phong_thi_nghiem' => 'bail|required|integer|unique:phong_thi_nghiem,id_phong_thi_nghiem',
                'name' => 'bail|required|unique:phong_thi_nghiem,name|min:4|max:100',
                'mo_ta' => 'required'
            ],
            [
                'id_phong_thi_nghiem.required' => 'Mã phòng thí nghiệm không được để trống',
                'id_phong_thi_nghiem.unique' => 'Mã phòng thí nghiệm  bạn nhập đã tồn tại',
                'id_phong_thi_nghiem.integer' => 'Mã phòng thí nghiệm  bạn nhập phải là kiểu số',
                'name.required' => 'Tên phòng thí nghiệm  không được để trống',
                'name.unique' => 'Tên phòng thí nghiệm  đã tồn tại',
                'name.min' => 'Tên phòng thí nghiệm  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên phòng thí nghiệm  phải có độ dài từ 4 đến 100 ký tự',
                'mo_ta.required' => 'Mô tả không được để trống'
            ]
        );
        $phongtn = new Phongtn();
        $phongtn->id_phong_thi_nghiem = $request->id_phong_thi_nghiem;
        $phongtn->name = $request->name;
        $phongtn->name_khong_dau = changeTitle($request->name);
        $phongtn->mo_ta = $request->mo_ta;
        $phongtn->id_khoa = $request->id_khoa;
        $phongtn->save();
        return redirect('admin/phongtn/danhsach')->with('message', 'Thêm phòng thí nghiệm thành công!');
    }

    public function getSua($id)
    {
        $khoa = Khoa::all();
        $phongtn = Phongtn::find($id);
        return view('admin.phongthinghiem.sua', ['phongtn' => $phongtn, 'khoa' => $khoa]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'id_phong_thi_nghiem' => 'bail|required|integer',
                'name' => 'bail|required|min:4|max:100',
                'mo_ta' => 'required'
            ],
            [
                'id_phong_thi_nghiem.required' => 'Mã phòng thí nghiệm không được để trống',
                'id_phong_thi_nghiem.integer' => 'Mã phòng thí nghiệm  bạn nhập phải là kiểu số',
                'name.required' => 'Tên phòng thí nghiệm  không được để trống',
                'name.min' => 'Tên phòng thí nghiệm  phải có độ dài từ 4 đến 100 ký tự',
                'name.max' => 'Tên phòng thí nghiệm  phải có độ dài từ 4 đến 100 ký tự',
                'mo_ta.required' => 'Mô tả không được để trống'
            ]
        );
        $phongtn = Phongtn::find($id);
        $phongtn->id_phong_thi_nghiem = $request->id_phong_thi_nghiem;
        $phongtn->name = $request->name;
        $phongtn->name_khong_dau = changeTitle($request->name);
        $phongtn->mo_ta = $request->mo_ta;
        $phongtn->id_khoa = $request->id_khoa;
        $phongtn->save();
        return redirect('admin/phongtn/danhsach')->with('message', 'Sửa phòng thí nghiệm thành công!');

    }

    public function getXoa($id)
    {
        $phongtn = Phongtn::find($id);
        $phongtn->delete();
        return redirect('admin/phongtn/danhsach')->with('message', 'Xóa phòng thí nghiệm     thành công');
    }
}
