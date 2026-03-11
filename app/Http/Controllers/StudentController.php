<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::where('status', '=', '1')
            ->get();

        return view('student.student', compact('students'));
    }


    public function store(Request $request)
    {
        Student::create([
            'ho_ten' => $request->nameHS,
            'ngay_sinh' => $request->ngaySinh,
            'phai' => $request->phai

        ]);

        return redirect()->back()->with('success', 'Thêm học sinh thành công');
    }
    public function edit($hocSinhId)
    {
        $student = Student::findOrFail($hocSinhId);

        return view('student.studentEdit', compact('student'));
    }
    public function update(Request $request, $hocSinhId)
    {
        $student = Student::findOrFail($hocSinhId);

        $student->update([
            'ho_ten' => $request->nameHS,
            'ngay_sinh' => $request->ngaySinh,
            'phai' => $request->phai
        ]);

        return redirect()->route('student.list')->with('success', 'Cập nhật thành công');
    }
    public function delete($hocSinhId)
    {
        $student = Student::findOrFail($hocSinhId);

        if ($student) {
            $student->status = 0;
            $student->save();
        }

        return redirect()->route('student.list')->with('success', 'Xóa thành công');
    }
}
