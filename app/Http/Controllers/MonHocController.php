<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function index()
    {
        $monHocs = MonHoc::where('status', 1)->get();

        return view('monHoc.monHoc', compact('monHocs'));
    }

    public function store(Request $request)
    {
        MonHoc::create([
            'ten_mon' => $request->nameMonHoc
        ]);

        return redirect()->back()->with('success', 'Thêm môn học thành công');
    }

    public function edit($monHocId)
    {
        $monHoc = MonHoc::findOrFail($monHocId);

        return view('monHoc.monHocEdit', compact('monHoc'));
    }

    public function update(Request $request, $monHocId)
    {
        $monHoc = MonHoc::findOrFail($monHocId);

        $monHoc->update([
            'ten_mon' => $request->tenMon
        ]);

        return redirect()->route('monHoc.list')->with('success', 'Cập nhật thành công');
    }

    public function delete($monHocId)
    {
        $monHoc = MonHoc::findOrFail($monHocId);

        $monHoc->status = 0;
        $monHoc->save();

        return redirect()->route('monHoc.list')->with('success', 'Xóa thành công');
    }
}
