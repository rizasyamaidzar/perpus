<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
        if($user->role == 1){
            // $profil = Guru::where("user_id", $user->id)->first();
            $peminjaman = Peminjaman::with(['siswa'])->get();
        }
        else{
            $peminjaman = Peminjaman::where("siswa_id", $siswa->id)->where("status", 'pinjam')->get();

        }
        
        return view('peminjaman.index',[
            'peminjaman' => $peminjaman,
            'title' => 'Peminjaman'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');
        $siswa = Siswa::all();
        $buku = Buku::all();
        return view('peminjaman.create',[
            'buku' => $buku,
            'siswa' => $siswa,
            'title' => 'Peminjaman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // @dd($request->all());
        // $this->authorize('admin');
        $siswa = Siswa::where('nisn',$request->siswa_id)->first();
        // @dd($siswa);
        $validateDate = $request->validate([
            "buku_id" => "required",
            "siswa_id"=> "required",
            
        ]);
        $validateDate['siswa_id'] = $siswa->id;
        $validateDate['tgl_pinjam'] = date('Y-m-d');
        $sevenDaysLater = date('Y-m-d', strtotime('+7 days'));
        $validateDate['tgl_kembali'] = $sevenDaysLater;
        $validateDate['status'] = 'pinjam';

        // update stok buku
        // Ambil buku dari database berdasarkan ID
        $buku = Buku::findOrFail($request->buku_id);
        $buku->jumlah -= 1;
        $buku->save();
        Peminjaman::create($validateDate);
        return redirect('/peminjaman')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
       
        // @dd($peminjaman);
        $siswa = Siswa::where("id", $peminjaman->siswa_id)->first();
        $buku = Buku::where("id", $peminjaman->buku_id)->first();
        return view('peminjaman.show',[
            'peminjaman' => $peminjaman,
            'siswa' => $siswa,
            'buku' => $buku,
            'title' => 'Peminjaman'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
        $this->authorize('admin');
        Peminjaman::where('id', $peminjaman->id)->delete();
        return redirect('/peminjaman')->with("success","Jadwal has been Deleted!");
    }
    public function scan(Request $request){
        $buku = Buku::where('isbn',$request->buku_id)->first();
        return view('peminjaman.scansiswa',[
            'buku' => $buku->id,
            'title' => 'Peminjaman'
        ]);
    }
}
