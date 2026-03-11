<?php

namespace App\Http\Controllers;

use App\Models\HocSinhLop;
use App\Models\Diem;

use Illuminate\Http\Request;

class HocSinhLopController extends Controller
{
    public function index()
    {
        $hocSinhLops = HocSinhLop::all();

        return view('hocSinhLop', compact('hocSinhLops'));
    }
    public function store(Request $request)
    {
        HocSinhLop::create([
            'hoc_sinh_id' => $request->hocSinhId,
            'lop_id' => $request->lopId,
            'nam_hoc' => $request->namHoc,
        ]);

        return redirect()->back()->with('success', 'Thêm HS vào lớp thành công');
    }

    public function getAllData()
    {

        $data = HocSinhLop::from('hoc_sinh_lop as hsl')
            ->select(
                'hsl.hoc_sinh_id',
                'hoc_sinh.ho_ten',
                'hsl.lop_id',
                'lop.ten_lop',
                'hsl.nam_hoc',
                'hoc_sinh.phai',
                'hoc_sinh.ngay_sinh'
            )
            ->join('hoc_sinh', 'hsl.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('lop',  'hsl.lop_id', '=', 'lop.lop_id')
            ->get();
        return $data;
    }
    public function getTiLeHocSinhCuaLopTheoHocKy($lopId, $hocKy)
    {
        $subData = Diem::from('diem as d')
            ->select(
                'hoc_sinh.hoc_sinh_id AS MaHS',
                'lop.lop_id AS MaLop',
                'lop.ten_lop AS TenLop'
            )
            ->selectRaw("AVG(d.diem) AS TBCaNam")
            ->join('hoc_sinh', 'd.hoc_sinh_id', '=', 'hoc_sinh.hoc_sinh_id')
            ->join('lop', 'd.lop_id', '=', 'lop.lop_id')
            ->where('lop.lop_id', $lopId)
            ->where('d.hoc_ky', $hocKy)
            ->groupBy(
                'hoc_sinh.hoc_sinh_id',
                'lop.lop_id'
            );
        $data = Diem::query()->fromSub($subData, 'DiemTBLop')
            ->select(
                'TenLop'
            )
            ->selectRaw("ROUND(COUNT(CASE WHEN TBCaNam >= 8.0 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhGioi")
            ->selectRaw("ROUND(COUNT(CASE WHEN TBCaNam >= 6.5 AND TBCaNam < 8.0 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhKha")
            ->selectRaw("ROUND(COUNT(CASE WHEN TBCaNam >= 5.0 AND TBCaNam < 6.5 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhTB")

            ->groupBy('TenLop')
            ->get();
        return $data;
    }
}
