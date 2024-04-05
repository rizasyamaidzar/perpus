<?php

namespace App\Models;
use App\Models\Pengembalian;
use App\Models\Soal_result;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pengembalian_id',
        'total_point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }
    public function soal_result()
    {
        return $this->hasMany(Soal_result::class);
    }
}
