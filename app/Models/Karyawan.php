<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gaji;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'no_telepon', 'gaji_id', 'alamat'];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class, 'gaji_id');
    }
}
