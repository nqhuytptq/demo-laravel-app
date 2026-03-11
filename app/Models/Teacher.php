<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'giao_vien';

    protected $primaryKey = 'gv_id';

    public $timestamps = false;

    protected $fillable = [
        'ho_ten',
        'dia_chi',
        'status'
    ];
    public function lop()
    {
        return $this->hasMany(LopHoc::class, 'gvcn_id', 'gv_id');
    }
    public function giangDay()
    {
        return $this->hasMany(LopHoc::class, 'gv_id', 'gv_id');
    }
}
