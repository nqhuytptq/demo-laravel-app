<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoi extends Model
{
    use HasFactory;
    protected $table = 'khoi';
    protected $primaryKey = 'khoi_id';

    public $timestamps = false;

    protected $fillable = [
        'ten_khoi',
        'status'
    ];
    public function lop()
    {
        return $this->hasMany(LopHoc::class, 'khoi_id', 'khoi_id');
    }

    public function mon()
    {
        return $this->belongsToMany(
            MonHoc::class,
            'khoi_mon',
            'khoi_id',
            'mon_id'
        );
    }
}
