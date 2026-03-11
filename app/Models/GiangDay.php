<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangDay extends Model
{
    use HasFactory;

    protected $table = 'giang_day';
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = [
        'gv_id',
        'lop_id',
        'mon_id',
        'nam_hoc',
        'status'
    ];
    public function lop()
    {
        return $this->belongsTo(LopHoc::class, 'lop_id');
    }
    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_id');
    }
    public function giaoVien()
    {
        return $this->belongsTo(Teacher::class, 'gv_id');
    }
}
