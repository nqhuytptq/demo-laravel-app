<?php

use App\Http\Controllers\DiemController;
use App\Http\Controllers\GiangDayController;
use App\Http\Controllers\HocSinhLopController;
use App\Http\Controllers\KhoiController;
use App\Http\Controllers\KhoiMonController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\MonHocController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiKiemTraController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Khoi;
use App\Models\LoaiKiemTra;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\Teacher;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Quản lý chung
Route::get('/chung', function () {
    return view('quanLy.quanLyChung');
});

Route::post('/hocSinh/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/hocSinh/list', [StudentController::class, 'index'])->name('student.list');
Route::get('/hocSinh/edit/{hocSinhId}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/hocSinh/update/{hocSinhId}', [StudentController::class, 'update'])->name('student.update');
Route::get('/hocSinh/delete/{hocSinhId}', [StudentController::class, 'delete'])->name('student.delete');

Route::post('/giaoVien/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/giaoVien/list', [TeacherController::class, 'index'])->name('teacher.list');
Route::get('/giaoVien/edit/{giaoVienId}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/giaoVien/update/{giaoVienId}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('/giaoVien/delete/{giaoVienId}', [TeacherController::class, 'delete'])->name('teacher.delete');

Route::post('/khoi/store', [KhoiController::class, 'store'])->name('khoi.store');
Route::get('/khoi/list', [KhoiController::class, 'index'])->name('khoi.list');
Route::get('/khoi/edit/{khoiId}', [KhoiController::class, 'edit'])->name('khoi.edit');
Route::post('/khoi/update/{khoiId}', [KhoiController::class, 'update'])->name('khoi.update');
Route::get('/khoi/delete/{khoiId}', [KhoiController::class, 'delete'])->name('khoi.delete');

Route::post('/monHoc/store', [MonHocController::class, 'store'])->name('monHoc.store');
Route::get('/monHoc/list', [MonHocController::class, 'index'])->name('monHoc.list');
Route::get('/monHoc/edit/{khoiId}', [MonHocController::class, 'edit'])->name('monHoc.edit');
Route::post('/monHoc/update/{khoiId}', [MonHocController::class, 'update'])->name('monHoc.update');
Route::get('/monHoc/delete/{khoiId}', [MonHocController::class, 'delete'])->name('monHoc.delete');

Route::post('/loaiKiemTra/store', [LoaiKiemTraController::class, 'store'])->name('loaiKiemTra.store');
Route::get('/loaiKiemTra/list', [LoaiKiemTraController::class, 'index'])->name('loaiKiemTra.list');
Route::get('/loaiKiemTra/edit/{loaiKiemTraId}', [LoaiKiemTraController::class, 'edit'])->name('loaiKiemTra.edit');
Route::post('/loaiKiemTra/update/{loaiKiemTraId}', [LoaiKiemTraController::class, 'update'])->name('loaiKiemTra.update');
Route::get('/loaiKiemTra/delete/{loaiKiemTraId}', [LoaiKiemTraController::class, 'delete'])->name('loaiKiemTra.delete');


// Quản lý điểm

Route::get('/tbTungMon/', [DiemController::class, 'trungBinhTungMon'])->name('tbTungMon.list');
Route::get('/tbCacMon/', [DiemController::class, 'trungBinhTatCaMon'])->name('tbCacMon.list');
Route::get('/getDKTNHS', [DiemController::class, 'getDieuKienTNHS'])->name('getDKTNHS.list');

Route::get('/diem', function () {
    $students = Student::where('status', '=', '1')
        ->get();
    $lopHocs = LopHoc::where('status', '=', '1')
        ->get();
    $monHocs = MonHoc::where('status', '=', '1')
        ->get();
    $loaiKiemTras = LoaiKiemTra::where('status', '=', '1')
        ->get();
    return view('quanLy.quanLyDiem', compact('students', 'lopHocs', 'monHocs', 'loaiKiemTras'));
});
Route::get('/diem/list', [DiemController::class, 'index'])->name('diem.list');
Route::post('/diem/store', [DiemController::class, 'store'])->name('diem.store');
Route::get('/diem/edit/{diemId}', [DiemController::class, 'edit'])->name('diem.edit');
Route::post('/diem/update/{diemId}', [DiemController::class, 'update'])->name('diem.update');
Route::get('/diem/delete/{diemId}', [DiemController::class, 'delete'])->name('diem.delete');


//quản lý GVCN

Route::get('/inPhieu/', [LopHocController::class, 'getPhieuDiemHS'])->name('inPhieu.list');

Route::get('/gvcn', function () {
    $teachers = Teacher::where('status', '=', '1')
        ->get();
    $students = Student::where('status', '=', '1')
        ->get();
    $khois = Khoi::where('status', '=', '1')
        ->get();
    return view('quanLy.quanLyGVCN', compact('teachers', 'khois', 'students'));
});
Route::get('/gvcn/list', [LopHocController::class, 'index'])->name('gvcn.list');
Route::post('/gvcn/store', [LopHocController::class, 'store'])->name('gvcn.store');



//chưa sửa


Route::get('/giangDay', [GiangDayController::class, 'getAllData']);
Route::get('/hocSinhLop', [HocSinhLopController::class, 'getAllData']);
Route::get('/getTiLeHocSinhCuaLopTheoHocKy/id/{lopId}/hocKy/{hocKy}', [HocSinhLopController::class, 'getTiLeHocSinhCuaLopTheoHocKy']);
Route::get('/khoi', [KhoiController::class, 'getAllData']);
Route::get('/khoiMon', [KhoiMonController::class, 'getAllData']);
Route::get('/lopHoc', [LopHocController::class, 'getAllData']);
Route::get('/getPhieuDiemHS/{id}', [LopHocController::class, 'getPhieuDiemHS']);
Route::get('/monHoc', [MonHocController::class, 'getAllData']);
Route::get('/hocsinh', [StudentController::class, 'getAllData']);
