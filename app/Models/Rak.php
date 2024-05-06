<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
class Rak extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'keterangan'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
