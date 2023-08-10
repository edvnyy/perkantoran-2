<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{

    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'jumlah_gaji',
    ];
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'gaji_id');
    }

}
