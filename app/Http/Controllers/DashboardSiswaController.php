<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Category;
use App\Models\Buku;
use App\Models\Guru;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSiswaController extends Controller
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
        // $siswa = Siswa::count();
        $peminjaman = Peminjaman::where("siswa_id", $siswa->id)->where('status','pinjam')->count();
        $pengembalian = Pengembalian::where("siswa_id", $siswa->id)->count();
        $pinjam = Peminjaman::where("siswa_id", $siswa->id)->get();
        // foreach($pinjam as $p){
        // // @dd($p->no_pinjam);
        // $pengembalian = Pengembalian::where("peminjaman_id", $p->id)->count();
        // }
        //
        return view('siswa.dashboard',[
            'siswa' => $siswa,
            'peminjaman'=> $peminjaman,
            'pengembalian' => $pengembalian,
            'title' => 'Dashboard Siswa'
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
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
