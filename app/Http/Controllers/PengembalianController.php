<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Siswa;
use App\Models\Pengembalian;
use App\Models\Soal_result;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePengembalianRequest;
use Illuminate\Support\Facades\Auth;
class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
        // $kuisSudahDikirim
       

        if($user->role == 1){
            // $profil = Guru::where("user_id", $user->id)->first();
            $kembali = Pengembalian::with(['peminjaman','siswa'])->get();
            $kuisSudahDikirim = 1;
        }
        else{
            $kembali = Pengembalian::with(['peminjaman','siswa'])->where("siswa_id", $siswa->id)->get();

        }
        // @dd($kembali);
        return view('pengembalian.index',[
            'kembali' => $kembali,
            'title' => 'Pengembalian',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('admin');
        $pinjam = Peminjaman::all();
        return view('pengembalian.create',[
            'pinjam' => $pinjam,
            'title' => 'Pengembalian'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('admin');
        $validateDate = $request->validate([
            "peminjaman_id" => "required",
        ]);
        $pinjam = Peminjaman::with('siswa')->where('id', $request->peminjaman_id)->first();
        Peminjaman::where("id",$pinjam->id)->update(['status' => 'kembali']);
        // Menentukan apakah terlambat atau tidak dan menentukan denda
        $tanggal_batas = new DateTime($pinjam->tgl_kembali);
        // Tanggal saat ini
        $tanggal_sekarang = Carbon::now();
        $denda = 0;
        if ($tanggal_sekarang > $tanggal_batas) {
            // Menghitung denda (misalnya 1000 per hari)
            $denda = ($tanggal_sekarang->diffInDays($tanggal_batas)) * 500;
            $point = $pinjam->siswa->point;
            $point -=20;    
            Siswa::where("id",$pinjam->siswa_id)->update(['point' => $point]);
        }else{
            if($pinjam->buku->tebal > 100){
                $point = $pinjam->siswa->point;
                $point +=200;
                Siswa::where("id",$pinjam->siswa_id)->update(['point' => $point]);
            }
            else if($pinjam->buku->tebal < 100 && $pinjam->buku->tebal > 50  ){
                $point = $pinjam->siswa->point;
                $point +=100;
                Siswa::where("id",$pinjam->siswa_id)->update(['point' => $point]);
            }
            else{
                $point = $pinjam->siswa->point;
                $point +=50;
                Siswa::where("id",$pinjam->siswa_id)->update(['point' => $point]);
            }
        }        
        $validateDate['tgl_kembali'] = date('Y-m-d');
        $validateDate['denda'] = $denda;
        $validateDate['siswa_id'] = $pinjam->siswa_id;
        // End keterlambatan
        // update stok buku
        $jumlah_buku = $pinjam->buku->jumlah;
        $jumlah_buku +=1;
        Buku::where("id",$pinjam->siswa_id)->update(['jumlah' => $jumlah_buku]);
        Pengembalian::create($validateDate);
        return redirect('/pengembalian')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengembalian $pengembalian)
    {
        //
        $siswa = Siswa::where("id", $pengembalian->siswa_id)->first();
        $buku = Buku::where("id", $pengembalian->peminjaman->buku_id)->first();
        $kode = Result::where('pengembalian_id',$pengembalian->id)->first();
        $soal_result = Soal_result::with('soal')->where('result_id', $kode->id)->get();
        // @dd($soal_result);
        return view('pengembalian.show',[
            'pengembalian' => $pengembalian,
            'siswa' => $siswa,
            'buku' => $buku,
            'id' => $pengembalian->id,
            'title' => 'Pengembalian',
            'soal_result' => $soal_result,
            'total' => $kode->total_point
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    public function kembali(Request $request){
        $buku = Buku::where('isbn',$request->isbn)->first();
        $pinjam = Peminjaman::with('buku')->where('buku_id', $buku->id)->get();
        return view('pengembalian.peminjam',[
            'title' =>'Pengembalian',
            'peminjaman' => $pinjam
        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
        $this->authorize('admin');
        Pengembalian::where('id', $pengembalian->id)->delete();
        return redirect('/pengembalian')->with("success","Jadwal has been Deleted!");
    }
}
