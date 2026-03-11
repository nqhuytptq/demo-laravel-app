<?php

namespace App\Http\Controllers;

use App\Models\Khoi;
use Illuminate\Http\Request;

class KhoiController extends Controller
{
    public function index()
    {
        $khois = Khoi::where('status', '=', '1')
            ->get();

        return view('khoi.khoi', compact('khois'));
    }
    public function store(Request $request)
    {
        Khoi::create([
            'ten_khoi' => $request->nameKhoi
        ]);

        return redirect()->back()->with('success', 'Thêm khối thành công');
    }

    public function edit($khoiId)
    {
        $khoi = Khoi::findOrFail($khoiId);

        return view('khoi.khoiEdit', compact('khoi'));
    }
    public function update(Request $request, $khoiId)
    {
        $khoi = Khoi::findOrFail($khoiId);

        $khoi->update([
            'ten_khoi' => $request->nameKhoi
        ]);

        return redirect()->route('khoi.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($khoiId)
    {
        $khoi = Khoi::findOrFail($khoiId);

        if ($khoi) {
            $khoi->status = 0;
            $khoi->save();
        }

        return redirect()->route('khoi.list')->with('success', 'Xóa thành công');
    }
}
