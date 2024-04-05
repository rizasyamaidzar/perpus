<?php

namespace App\Http\Controllers;

use App\Models\Simpan;
use App\Models\Buku;
use App\Models\Siswa;
// use App\Http\Requests\Request;
use App\Http\Requests\UpdateSimpanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class SimpanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('siswa.daftarbuku',[
            'buku' => $buku,
            'title' => 'Daftar Buku'
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
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
        $validateDate = $request->validate([
            "buku_id"=> "required",
        ]);
        $validateDate['siswa_id'] = $siswa->id;
        Simpan::create($validateDate);
        return redirect('/daftarbuku')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $daftarbuku)
    {
        
        //
        return view('siswa.showbuku',[
            'buku' => $daftarbuku,
            'title' => 'Daftar Buku'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Simpan $simpan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSimpanRequest $request, Simpan $simpan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simpan $simpan)
    {
        //
    }
}
