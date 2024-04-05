<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all(); 
        return view('siswa.index',[
            'siswa' => $siswa,
            'title' => 'Siswa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create',[
            'title' => 'Siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $tanggalTanpaStrip = Str::replace('-', '', $request->tanggal);
        $validateDate = $request->validate([
            "nama"=> "required",
            "nisn" =>"required",
            "jenis_kelamin" =>"required",
            "kelas" =>"required",
            "tempat_lahir" =>"required",
            "tanggal" =>"required",
            "foto" => "image|file|max:2048",
        ]);

        $user = User::create([
            "username" => $validateDate['nisn'],
            "password" => $tanggalTanpaStrip,
            "role" => 0,
        ]);
        $newUser = $user->id;

        if($request->file('foto')){
            $namacover = "$request->nama".".".$validateDate['foto']->getClientOriginalExtension();
            $validateDate['foto']  = $validateDate['foto']->storeAs("foto-siswa",$namacover);
        }      
        $validateDate['user_id'] = $newUser;
        $validateDate['point'] = 0;
        Siswa::create($validateDate);
        return redirect('/siswa')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show',[
            'siswa' => $siswa,
            'title' => 'Siswa'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    { 
        return view('siswa.edit',[
            'siswa' => $siswa,
            'title' => 'Siswa'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validateDate = $request->validate([
            "nama"=> "required",
            "nisn" =>"required",
            "jenis_kelamin" =>"required",
            "kelas" =>"required",
            "tempat_lahir" =>"required",
            "tanggal" =>"required",
            "foto" => "image|file|max:2048",
        ]);
        
        if($request->file('foto')){
            $namacover = "$request->nama".".".$validateDate['foto']->getClientOriginalExtension();
            $validateDate['foto']  = $validateDate['foto']->storeAs("foto-siswa",$namacover);
        }     
        Siswa::where("id",$siswa->id)->update($validateDate);
        return redirect('/siswa')->with("success","Program has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        if ($siswa->sampul){
            Storage::delete($siswa->foto);
        }
        Siswa::destroy($siswa->id);
        User::where('id', $siswa->user_id)->delete();
        return redirect('/siswa')->with("success","Jadwal has been Deleted!");
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('SiswaData', $namafile);

        Excel::import(new SiswaImport, \public_path('/SiswaData/'.$namafile));
        return redirect()->back();
    }
}
