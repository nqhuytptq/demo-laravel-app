<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('status', '=', '1')
            ->get();

        return view('teacher.teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        Teacher::create([
            'ho_ten' => $request->nameGV,
            'dia_chi' => $request->address
        ]);

        return redirect()->back()->with('success', 'Thêm giáo viên thành công');
    }
    public function edit($giaoVienId)
    {
        $teacher = Teacher::findOrFail($giaoVienId);

        return view('teacher.teacherEdit', compact('teacher'));
    }
    public function update(Request $request, $giaoVienId)
    {
        $teacher = Teacher::findOrFail($giaoVienId);

        $teacher->update([
            'ho_ten' => $request->nameGV,
            'dia_chi' => $request->address
        ]);

        return redirect()->route('teacher.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($giaoVienId)
    {
        $teacher = Teacher::findOrFail($giaoVienId);

        if ($teacher) {
            $teacher->status = 0;
            $teacher->save();
        }

        return redirect()->route('teacher.list')->with('success', 'Xóa thành công');
    }
}
