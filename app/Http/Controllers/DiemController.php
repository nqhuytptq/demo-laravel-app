<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diem;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class DiemController extends Controller
{
    public function index()
    {
        $diems = Diem::from('diem as d')
            ->select(
                'd.diem_id',
                'd.hoc_ky',
                'd.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'd.lop_id',
                'lop.ten_lop',
                'd.mon_id',
                'mon_hoc.ten_mon',
                'd.loai_kt_id',
                'loai_kiem_tra.ten_loai',
                'd.nam_hoc',
                'd.diem'
            )
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('lop', 'd.lop_id', '=', 'lop.lop_id')
            ->join('mon_hoc',  'd.mon_id', '=', 'mon_hoc.mon_id')
            ->join('loai_kiem_tra', 'd.loai_kt_id', '=', 'loai_kiem_tra.loai_kt_id')

            ->where('hoc_sinh.status', '=', '1')
            ->where('lop.status', '=', '1')
            ->where('mon_hoc.status', '=', '1')
            ->where('loai_kiem_tra.status', '=', '1')
            ->where('d.status', '=', '1')
            ->get();

        $students = Student::where('status', '=', '1')
            ->get();
        return view('diem.diem', [
            'students' => $students,
            'diems' => $diems
        ]);
    }
    public function store(Request $request)
    {
        Diem::create([
            'hoc_ky' => $request->hocKy,
            'hoc_sinh_id' => $request->hocSinhId,
            'lop_id' => $request->lopId,
            'mon_id' => $request->monId,
            'loai_kt_id' => $request->loaiKiemTraId,
            'nam_hoc' => $request->namHoc,
            'diem' => $request->diem
        ]);

        return redirect()->back()->with('success', 'Thêm điểm thành công');
    }
    public function edit($diemId)
    {
        $diem = Diem::findOrFail($diemId);

        return view('diem.diemEdit', compact('diem'));
    }




    public function update(Request $request, $diemId)
    {
        $diem = Diem::findOrFail($diemId);

        $diem->update([
            'hoc_ky' => $request->hocKy,
            'hoc_sinh_id' => $request->hocSinhId,
            'lop_id' => $request->lopId,
            'mon_id' => $request->monId,
            'loai_kt_id' => $request->loaiKiemTraId,
            'nam_hoc' => $request->namHoc,
            'diem' => $request->diem
        ]);

        return redirect()->route('diem.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($diemId)
    {
        $diem = Diem::findOrFail($diemId);
        if ($diem) {
            $diem->status = 0;
            $diem->save();
        }
        return redirect()->route('diem.list')->with('success', 'Xóa thành công');
    }

    public function trungBinhTungMon(Request $request)
    {
        $hocSinhId = $request->hocSinhId;
        $hocKy = $request->hocKy;
        $data = Diem::from('diem as d')
            ->select(
                'd.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'd.mon_id',
                'mon_hoc.ten_mon',
                'd.hoc_ky'
            )
            ->selectRaw("AVG(d.diem) as TBMon")
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('mon_hoc', 'd.mon_id', '=', 'mon_hoc.mon_id')
            ->where('d.hoc_sinh_id', $hocSinhId)
            ->where('d.hoc_ky', $hocKy)
            ->groupBy(
                'd.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'd.mon_id',
                'mon_hoc.ten_mon',
                'd.hoc_ky',
                'd.diem'
            )
            ->get();
        return $data;
    }

    public function trungBinhTatCaMon(Request $request)
    {
        $hocSinhId = $request->hocSinhId;
        $hocKy = $request->hocKy;
        $subQuery = Diem::from('diem as d')
            ->select(
                'hoc_sinh.hoc_sinh_id as MaHS',
                'hoc_sinh.ho_ten as TenHS',
                'mon_hoc.ten_mon as TenMon',
                'd.hoc_ky as HocKy'
            )
            ->selectRaw("AVG(d.diem) as TBMon")
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('mon_hoc', 'd.mon_id', '=', 'mon_hoc.mon_id')
            ->where('d.hoc_sinh_id', $hocSinhId)
            ->where('d.hoc_ky', $hocKy)
            ->groupBy(
                'hoc_sinh.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'mon_hoc.mon_id',
                'mon_hoc.ten_mon',
                'd.hoc_ky'
            );

        $data = Diem::query()->fromSub($subQuery, 'TBCaNam')
            ->select(
                'MaHS',
                'TenHS',
                'HocKy'
            )
            ->selectRaw("AVG(TBMon) as TBCaNam")
            ->groupBy('MaHS', 'TenHS', 'HocKy')
            ->get();

        return $data;
    }

    public function getDieuKienTNHS(Request $request)
    {
        $hocSinhId = $request->hocSinhId;
        $hocKy = $request->hocKy;
        $subData = Diem::from('diem as d')
            ->select(
                'hoc_sinh.hoc_sinh_id as MaHS',
                'hoc_sinh.ho_ten as TenHS',
                'mon_hoc.ten_mon as TenMon',
                'd.hoc_ky as HocKy'
            )
            ->selectRaw('AVG(d.diem) as TBMon')
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('mon_hoc', 'd.mon_id', '=', 'mon_hoc.mon_id')
            ->where('d.hoc_sinh_id', $hocSinhId)
            ->where('d.hoc_ky', $hocKy)
            ->groupBy(
                'hoc_sinh.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'mon_hoc.mon_id',
                'mon_hoc.ten_mon',
                'd.hoc_ky'
            );

        $data = Diem::query()->fromSub($subData, 'TBCaNam')
            ->select(
                'MaHS',
                'TenHS',
                'HocKy'
            )
            ->selectRaw("AVG(TBMon) as TBCaNam")
            ->selectRaw(" CASE
        WHEN AVG(TBMon) >= 5.0 THEN 'Đủ điều kiện tốt nghiệp'
        WHEN AVG(TBMon) < 5.0 THEN 'Không đủ điều kiện tốt nghiệp'
    END AS HocLuc")
            ->groupBy('MaHS', 'TenHS', 'HocKy')
            ->get();

        return $data;
    }
}
