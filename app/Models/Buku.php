<?php

namespace App\Models;
use App\Models\Peminjaman;
use App\Models\Simpan;
use App\Models\Soal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'sampul',
        'isbn',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'jumlah',
        'tebal',
        'category_id',
        'rak_id',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function simpan()
    {
        return $this->hasMany(Simpan::class);
    }
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
}
