<?php

namespace App\Http\Controllers;

use App\Detai;
use App\Jobs\SendMailBaoveDetai;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

class DetaiController extends Controller
{
    public function getChopheduyet()
    {
        $detai = Detai::where('gv_chap_nhan', 1)->get();
        return view('admin.detai.chopheduyet', ['detai' => $detai]);
    }

    public function getChapnhan($id)
    {
        $detai = Detai::find($id);
        $detai->hd_chap_nhan = 1;
        $detai->save();
        return redirect('admin/detai/duocchapnhan')->with('message', 'Đề tài đã được chấp nhận');
    }

    public function getDuocchapnhan()
    {
        $detai = Detai::where('hd_chap_nhan', 1)->get();
        return view('admin.detai.duocchapnhan', ['detai' => $detai]);
    }

    public function getXoadetai($id)
    {
        $detai = Detai::find($id);
        $detai->delete();
        return redirect('admin/detai/chopheduyet')->with('message', 'Xóa đề tài thành công');
    }

    public function getRutdangky()
    {
        $detai = Detai::where('xin_huy', 1)->get();
        return view('admin.detai.rutdangky', ['detai' => $detai]);
    }

    public function getGuimailbaove()
    {
        $detai = Detai::where('hd_chap_nhan', 1)->get();
        foreach ($detai as $dt) {
            $usersendMail = User::findOrFail($dt->sinhvien->id_sinh_vien);
            $this->dispatch(new SendMailBaoveDetai($usersendMail));
        }
        return redirect('admin/detai/duocchapnhan')->with('message', 'Gửi Mail thông báo bảo vệ đề tài thành công');
    }

    public function getXuatdanhsach()
    {
        $export = Detai::select('id_sv', 'name', 'noi_dung')->where('hd_chap_nhan', 1)->get();
        Excel::create('export date', function ($excel) use ($export) {
            $excel->sheet('Sheet 1', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xlsx');
    }
}
