<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Simpan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SimpanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
        // @dd($siswa->nama);
        $simpan = Simpan::with(['buku'])->where('siswa_id',$siswa->id)->get();
        return view('siswa.simpan.index',[
            'simpan' => $simpan,
            'title' => 'Buku Tersimpan'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Simpan $simpan)
    {

        // @dd($simpan);
        $buku = Buku::where('id',$simpan->buku_id)->first();
        //
        // @dd($buku->sampul);
        return view('siswa.simpan.show',[
            'buku' => $buku,
            'title' => 'Buku Tersimpan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simpan $simpan)
    {
        //
        Simpan::destroy($simpan->id);
        return redirect('/simpan')->with("success","Jadwal has been Deleted!");
    }
}
