<?php

namespace App\Http\Controllers;

use App\Models\KhoiMon;
use Illuminate\Http\Request;

class KhoiMonController extends Controller
{
    public function index()
    {
        $khoiMons = KhoiMon::all();

        return view('khoiMon', compact('khoiMons'));
    }
    public function store(Request $request)
    {
        KhoiMon::create([
            'khoi_id' => $request->khoiId,
            'mon_id' => $request->monId,
        ]);

        return redirect()->back()->with('success', 'Thêm môn học các khối thành công');
    }

    public function getAllData()
    {

        $data = KhoiMon::from('khoi_mon as km')
            ->select(
                'km.khoi_id',
                'khoi.ten_khoi',
                'km.mon_id',
                'mon_hoc.ten_mon'
            )
            ->join('khoi', 'km.khoi_id', '=', 'khoi.khoi_id')
            ->join('mon_hoc', 'km.mon_id', '=', 'mon_hoc.mon_id')
            ->get();
        return $data;
    }
}
