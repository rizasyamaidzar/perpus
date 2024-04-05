<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Options;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $soal = Soal::with(['buku'])->get();
        $option = Options::with(['soal'])->get();

        return view('soal.index',[
            'soal' => $soal,
            'option' => $option,
            'title' => 'Soal & Jawaban '
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buku = Buku::all();
        return view('soal.createsoal',[
            'title' => 'Soal',
            'buku' => $buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $validatedData = $request->validate([
            'buku_id' => 'required',
            'soal' => 'required|string',
        ]);

        Soal::create($validatedData);
        
        return redirect()->route('soal.index')->with('success', 'Category created successfully.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal $soal)
    {
        //
        $buku = Buku::all(); 
        return view('soal.editsoal',[
            'soal' => $soal,
            'title' => 'Soal',
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal $soal)
    {
        //
        $validateDate = $request->validate([
            'buku_id' => 'required',
            'soal' => 'required|string',
        ]);
        Soal::where("id",$soal->id)->update($validateDate);

        return redirect('/soal')->with("success","New Category has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        //
        Soal::destroy($soal->id);
        return redirect('/soal')->with("success","Jadwal has been Deleted!");
    }
}
