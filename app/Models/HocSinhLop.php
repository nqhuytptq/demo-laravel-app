<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocSinhLop extends Model
{
    use HasFactory;
    protected $table = 'hoc_sinh_lop';

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = [
        'hoc_sinh_id',
        'lop_id',
        'nam_hoc',
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
}
