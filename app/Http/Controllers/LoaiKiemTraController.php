<?php

namespace App\Http\Controllers;

use App\Models\LoaiKiemTra;
use Illuminate\Http\Request;

class LoaiKiemTraController extends Controller
{

    public function index()
    {
        $loaiKiemTras = LoaiKiemTra::where('status', 1)->get();

        return view('loaiKiemTra.loaiKiemTra', compact('loaiKiemTras'));
    }

    public function store(Request $request)
    {
        LoaiKiemTra::create([
            'ten_loai' => $request->nameLoaiKiemTra,
            'he_so' => $request->heSoLoaiKiemTra
        ]);

        return redirect()->back()->with('success', 'Thêm thành công');
    }

    public function edit($loaiKiemTraId)
    {
        $loaiKiemTra = LoaiKiemTra::findOrFail($loaiKiemTraId);

        return view('loaiKiemTra.loaiKiemTraEdit', compact('loaiKiemTra'));
    }

    public function update(Request $request, $loaiKiemTraId)
    {
        $loaiKiemTra = LoaiKiemTra::findOrFail($loaiKiemTraId);

        $loaiKiemTra->update([
            'ten_loai' => $request->nameLoaiKiemTra,
            'he_so' => $request->heSoLoaiKiemTra
        ]);

        return redirect()->route('loaiKiemTra.list')->with('success', 'Cập nhật thành công');
    }

    public function delete($loaiKiemTraId)
    {
        $loaiKiemTra = LoaiKiemTra::findOrFail($loaiKiemTraId);

        $loaiKiemTra->status = 0;
        $loaiKiemTra->save();

        return redirect()->route('loaiKiemTra.list')->with('success', 'Xóa thành công');
    }
}
