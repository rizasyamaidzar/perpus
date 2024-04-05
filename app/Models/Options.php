<?php

namespace App\Models;
use App\Models\Soal;
use App\Models\Soal_result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;
    protected $fillable = [
        'soal_id',
        'option',
        'point',
    ];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
    public function soal_result()
    {
        return $this->hasMany(Soal_result::class);
    }
}
