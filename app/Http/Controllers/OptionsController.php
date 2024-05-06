<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreOptionsRequest;
use App\Http\Requests\UpdateOptionsRequest;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $soal = Soal::all();
        return view('soal.createoption',[
            'title' => 'Options',
            'soal' => $soal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'soal_id' => 'required',
            'option' => 'required|string',
            'point' => 'required',
        ]);

        Options::create($validatedData);
        
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Options $options)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Options $option)
    {
        //
        $soal = Soal::all(); 
        return view('soal.editoption',[
            'soal' => $soal,
            'title' => 'Soal',
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Options $option)
    {
        // //
        // @dd($request->all());
        $validateDate = $request->validate([
            'soal_id' => 'required',
            'option' => 'required|string',
            'point' => 'required'
        ]);
        Options::where("id",$option->id)->update($validateDate);

        return redirect('/soal')->with("success","New Category has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Options $option)
    {
        Options::destroy($option->id);
        return redirect()->back()->with("success","Jadwal has been Deleted!");
    }
}
