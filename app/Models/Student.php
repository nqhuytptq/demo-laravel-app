<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'hoc_sinh';

    protected $primaryKey = 'hoc_sinh_id';

    public $timestamps = false;

    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'phai',
        'status'
    ];
    public function diem()
    {
        return $this->hasMany(Diem::class, 'hoc_sinh_id', 'hoc_sinh_id');
    }
    public function hocSinhLop()
    {
        return $this->belongsToMany(LopHoc::class, 'hoc_sinh_lop', 'hoc_sinh_id', 'lop_id');
    }
}
