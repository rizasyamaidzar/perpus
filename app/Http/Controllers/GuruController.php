<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('admin');
        $guru = Guru::all();
        return view('guru.index',[
            'guru' => $guru,
            'title' => 'Admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create',[
            'title' => 'Admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            "nama"=> "required",
            "nip" =>"required",
            "jenis_kelamin" =>"required",
            'username' =>'required',
            'password' => 'required',
        ]);

        $user = User::create([
            "username" => $validateDate['username'],
            "password" => $validateDate['password'],
            "role" => 1,
        ]);
        $newUser = $user->id;
        $validateDate['user_id'] = $newUser;
        Guru::create($validateDate);
        return redirect('/guru')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show',[
            'guru' => $guru,
            'title' => 'Admin'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit',[
            'guru' => $guru,
            'title' => 'Admin'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
        $validateDate = $request->validate([
            "nama"=> "required",
            "nip" =>"required",
            "jenis_kelamin" =>"required",
        ]);
        Guru::where("id",$guru->id)->update($validateDate);
        return redirect('/guru')->with("success","Program has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
        Guru::destroy($guru->id);
        User::where('id', $guru->user_id)->delete();
        return redirect('/guru')->with("success","Jadwal has been Deleted!");
    }
}
