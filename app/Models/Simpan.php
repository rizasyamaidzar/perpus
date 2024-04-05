<?php

namespace App\Models;
use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpan extends Model
{
    use HasFactory;
    protected $fillable = [
        'buku_id',
        'siswa_id'
    ];
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
