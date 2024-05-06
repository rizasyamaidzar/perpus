<?php

namespace App\Models;
use App\Models\Peminjaman;
use App\Models\Simpan;
use App\Models\Category;
use App\Models\Soal;
use App\Models\Rak;
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
        'level',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
