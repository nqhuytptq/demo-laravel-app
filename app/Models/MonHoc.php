<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = 'mon_hoc';

    protected $primaryKey = 'mon_id';

    public $timestamps = false;

    protected $fillable = [
        'ten_mon',
    ];
    public function khoi()
    {
        return $this->belongsToMany(
            Khoi::class,
            'khoi_mon',
            'mon_id',
            'khoi_id',
            'status'
        );
    }
    public function diem()
    {
        return $this->hasMany(Diem::class, 'mon_id', 'mon_id');
    }
    public function giangDay()
    {
        return $this->hasMany(GiangDay::class, 'mon_id', 'mon_id');
    }
}
