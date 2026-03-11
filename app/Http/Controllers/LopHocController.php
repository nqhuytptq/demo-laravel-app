<?php

namespace App\Http\Controllers;

use App\Models\Diem;
use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function index()
    {
        $lopHocs = LopHoc::from('lop as l')
            ->select(
                'l.lop_id',
                'l.ten_lop',
                'l.khoi_id',
                'khoi.ten_khoi',
                'l.gvcn_id',
                'giao_vien.ho_ten',
                'l.nam_hoc'
            )
            ->join('khoi', 'l.khoi_id', '=', 'khoi.khoi_id')
            ->join('giao_vien', 'l.gvcn_id', '=', 'giao_vien.gv_id')

            ->where('khoi.status', '=', '1')
            ->where('giao_vien.status', '=', '1')
            ->where('l.status', '=', '1')

            ->get();
        return view('teacher.gvcn', [
            'lopHocs' => $lopHocs
        ]);
    }
    public function store(Request $request)
    {
        LopHoc::create([
            'khoi_id' => $request->khoiId,
            'gvcn_id' => $request->gvId,
            'ten_lop' => $request->tenLop,
            'nam_hoc' => $request->namHoc
        ]);

        return redirect()->back()->with('success', 'Thêm lớp học thành công');
    }


    public function getPhieuDiemHS(Request $request)
    {
        $hocSinhId = $request->hocSinhId;
        $data = Diem::from('diem as d')
            ->select(
                'hoc_sinh.hoc_sinh_id AS MaHS',
                'hoc_sinh.ho_ten AS TenHS',
                'hoc_sinh.ngay_sinh AS NgaySinh',
                'lop.ten_lop AS TenLop',
                'lop.nam_hoc AS NamHoc',
                'giao_vien.ho_ten AS TenGVCN',
                'mon_hoc.ten_mon AS TenMon',
                'd.hoc_ky AS HocKy'
            )
            ->selectRaw("SUM(d.diem * loai_kiem_tra.he_so) / SUM(loai_kiem_tra.he_so) AS TBMon")
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('mon_hoc', 'd.mon_id', '=', 'mon_hoc.mon_id')
            ->join('lop', 'd.lop_id', '=', 'lop.lop_id')
            ->join('giao_vien', 'lop.gvcn_id', '=', 'giao_vien.gv_id')
            ->join('loai_kiem_tra', 'd.loai_kt_id', '=', 'loai_kiem_tra.loai_kt_id')
            ->where('hoc_sinh.hoc_sinh_id', $hocSinhId)
            ->groupBy(
                'hoc_sinh.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'hoc_sinh.ngay_sinh',
                'lop.ten_lop',
                'lop.nam_hoc',
                'giao_vien.ho_ten',
                'mon_hoc.mon_id',
                'mon_hoc.ten_mon',
                'd.hoc_ky'
            )
            ->get();
        // return $data;
        return view('loaikiemtra.phieuDiem', compact('data'));
    }
}
