<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;
    protected $table = 'lop';

    protected $primaryKey = 'lop_id';

    public $timestamps = false;

    protected $fillable = [
        'khoi_id',
        'gvcn_id',
        'ten_lop',
        'nam_hoc',
        'status'
    ];
    public function khoi()
    {
        return $this->belongsTo(Khoi::class, 'khoi_id');
    }
    public function gvcn()
    {
        return $this->belongsTo(Teacher::class, 'gv_id');
    }
    public function diem()
    {
        return $this->hasMany(Diem::class, 'diem_id');
    }
    public function giangDay()
    {
        return $this->hasMany(GiangDay::class, 'lop_id');
    }
    public function hocSinh()
    {
        return $this->belongsToMany(
            Student::class,
            'hoc_sinh_lop',
            'lop_id',
            'hoc_sinh_id'
        )->withPivot('nam_hoc');
    }
}
