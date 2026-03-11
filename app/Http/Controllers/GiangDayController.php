<?php

namespace App\Http\Controllers;

use App\Models\GiangDay;
use Illuminate\Http\Request;

class GiangDayController extends Controller
{
    public function index()
    {
        $giangDays = GiangDay::all();

        return view('giangDay', compact('giangDays'));
    }
    public function store(Request $request)
    {
        GiangDay::create([
            'gv_id' => $request->gvId,
            'lop_id' => $request->lopId,
            'mon_id' => $request->monId,
            'nam_hoc' => $request->namHoc
        ]);

        return redirect()->back()->with('success', 'Thêm GV giảng dạy thành công');
    }

    public function getAllData()
    {

        $data = GiangDay::from('giang_day as gd')
            ->select(
                'gd.gv_id',
                'giao_vien.ho_ten',
                'gd.mon_id',
                'mon_hoc.ten_mon',
                'gd.lop_id',
                'lop.ten_lop',
                'gd.nam_hoc'
            )
            ->join('giao_vien', 'gd.gv_id', '=', 'giao_vien.gv_id')
            ->join('mon_hoc', 'gd.mon_id', '=', 'mon_hoc.mon_id')
            ->join('lop',  'gd.lop_id', '=', 'lop.lop_id')
            ->get();
        return $data;
    }
}
