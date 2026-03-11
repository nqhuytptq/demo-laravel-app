<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    protected $table = 'diem';

    protected $primaryKey = 'diem_id';

    public $timestamps = false;

    protected $fillable = [
        'hoc_ky',
        'hoc_sinh_id',
        'lop_id',
        'mon_id',
        'loai_kt_id',
        'nam_hoc',
        'diem',
        'status'
    ];
    public function hocSinh()
    {
        return $this->belongsTo(Student::class, 'hoc_sinh_id');
    }

    public function lop()
    {
        return $this->belongsTo(LopHoc::class, 'lop_id');
    }

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_id');
    }

    public function loaiKiemTra()
    {
        return $this->belongsTo(LoaiKiemTra::class, 'loai_kt_id');
    }
}
