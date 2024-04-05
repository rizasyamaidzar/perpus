<?php

namespace App\Models;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nisn',
        'jenis_kelamin',
        'kelas',
        'tempat_lahir',
        'tanggal',
        'foto',
        'point',
        'user_id',
    ];

    
    public function meminjamBukuHariIni()
    {
        return $this->peminjaman()->where('tgl_pinjam', Carbon::today())->exists();
    }

    public function kurangiPoin()
    {
        $this->point -= 10; 
        $this->save();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
