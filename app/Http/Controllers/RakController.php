<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RakController extends Controller
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
        return view('rak.create',[
            'title' => 'Rak'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (Gate::allows('admin')) {
            // Jika pengguna memiliki izin 'admin', lanjutkan dengan menyimpan kategori
            $validatedData = $request->validate([
                'nama' => 'required|string',
                'keterangan' => 'required|string',
            ]);

            Rak::create($validatedData);
            
            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } else {
            // Jika pengguna tidak memiliki izin 'admin', kembalikan respons 403 (Unauthorized)
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rak $rak)
    {
        //
        return view('rak.edit',[
            'rak' => $rak,
            'title' => 'Rak'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rak $rak)
    {
        //
        $validateDate = $request->validate([
            'nama' => 'required|string',
            'keterangan' => 'required|string',
        ]);
        Rak::where("id",$rak->id)->update($validateDate);

        return redirect('/category')->with("success","New Category has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rak $rak)
    {
        //
        Rak::destroy($rak->id);
        return redirect('/category')->with("success","Jadwal has been Deleted!");
    }
}
