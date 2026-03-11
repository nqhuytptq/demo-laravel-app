<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoiMon extends Model
{
    use HasFactory;
    protected $table = 'khoi_mon';

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $fillable = [
        'khoi_id',
        'mon_id',
        'status'
    ];
    public function khoi()
    {
        return $this->belongsTo(Khoi::class, 'khoi_id');
    }
    public function mon()
    {
        return $this->belongsTo(MonHoc::class, 'mon_id');
    }
}
