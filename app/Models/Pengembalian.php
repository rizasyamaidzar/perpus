<?php

namespace App\Models;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'tgl_kembali',
        'denda',
        'siswa_id',
    ];
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
