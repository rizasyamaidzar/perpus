<?php

namespace App\Models;
use App\Models\Result;
use App\Models\Soal;
use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal_result extends Model
{
    use HasFactory;
    protected $fillable = [
        'result_id',
        'soal_id',
        'option_id',
        'point',
    ];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
    public function option()
    {
        return $this->belongsTo(Options::class);
    }
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
