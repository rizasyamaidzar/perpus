<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_pinjam',
        'tgl_pinjam',
        'tgl_kembali',
        'buku_id',
        'siswa_id',
        'status',
    ];
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }

}
