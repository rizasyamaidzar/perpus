<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Options;
use App\Models\Buku;
use App\Models\Soal_result;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'buku_id',
        'soal'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function options()
    {
        return $this->hasMany(Options::class);
    }
    public function soal_result()
    {
        return $this->belongsTo(Result::class);
    }
}
