<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $user = Auth::user();
        if($user->role == 1){
            $profil = Guru::where("user_id", $user->id)->first();
        }
        else{
            $profil = Siswa::where("user_id", $user->id)->first();
        }
        return view('biodatasiswa',[
            'profil' => $profil,
            'title' => $profil->nama
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
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
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $profil)
    {
        //
        $validateDate = $request->validate([
            "foto" => "image|file|max:2048",
        ]);
        if($request->file('foto')){
            $namacover = "$request->nama".".".$validateDate['foto']->getClientOriginalExtension();
            $validateDate['foto']  = $validateDate['foto']->storeAs("foto-siswa",$namacover);
        }     
        Siswa::where("id",$profil->id)->update($validateDate);
        return back()->with("success", "Program has been Updated!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
