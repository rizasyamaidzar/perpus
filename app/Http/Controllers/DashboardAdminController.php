<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Category;
use App\Models\Buku;
use App\Models\Rak;
use App\Models\Guru;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $login = Guru::where("user_id", $user->id)->first();
        $category = Category::count();
        $buku = Buku::count();
        $rak = Rak::count();
        $siswa = Siswa::count();
        $peminjaman = Peminjaman::count();
        $pengembalian = Pengembalian::count();
        //
        return view('dashboard',[
            'guru' => $login,
            'category'=> $category,
            'siswa' => $siswa,
            'buku' => $buku,
            'rak' => $rak,
            'peminjaman'=> $peminjaman,
            'pengembalian' => $pengembalian,
            'title' => 'Dashboard Admin'
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
