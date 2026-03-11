<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKiemTra extends Model
{
    use HasFactory;
    protected $table = 'loai_kiem_tra';

    protected $primaryKey = 'loai_kt_id';

    public $timestamps = false;

    protected $fillable = [
        'ten_loai',
        'he_so',
        'status'
    ];
    public function diem()
    {
        return $this->hasMany(Diem::class, 'loai_kt_id');
    }
}
