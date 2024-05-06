<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with(['category','rak'])->get();

        return view('buku.index',[
            'buku' => $buku,
            'title' => 'Buku'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin');
        $category = Category::all(); 
        $rak = Rak::all(); 
        return view('buku.create',[
            'category' => $category,
            'rak' => $rak,
            'title' => 'Buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validateDate = $request->validate([
            "sampul" => "image|file|max:2048",
            "isbn"=> "required",
            "judul" =>"required",
            "pengarang" =>"required",
            "penerbit" =>"required",
            "tahun" =>"required",
            "jumlah" =>"required",
            "tebal" =>"required",
            "level" =>"required",
            "category_id" =>"required",
            "rak_id" =>"required",
            
        ]);
        if($request->file('sampul')){
            $namacover = "$request->judul".".".$validateDate['sampul']->getClientOriginalExtension();
            $validateDate['sampul']  = $validateDate['sampul']->storeAs("buku-cover",$namacover);
        }      
        // Membuat buku baru
        $buku = Buku::create($validateDate);
        // Gabungkan id_buku dengan judul untuk membuat kode
        $kode = $buku->id . '_' . $request->judul;
        $buku->update(['kode' => $kode]);
        return redirect('/buku')->with("success","New Program has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show',[
            'buku' => $buku,
            'title' => 'Buku'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $this->authorize('admin');
        $category = Category::all(); 
        return view('buku.edit',[
            'category' => $category,
            'buku' => $buku,
            'title' => 'Buku'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $this->authorize('admin');
        $validateDate = $request->validate([
            "sampul" => "image|file|max:2048",
            "isbn"=> "required",
            "judul" =>"required",
            "pengarang" =>"required",
            "penerbit" =>"required",
            "tahun" =>"required",
            "jumlah" =>"required",
            "tebal" =>"required",
            "level" =>"required",
            "category_id" =>"required",
            "rak_id" =>"required",
        ]);
        
        if($request->file('sampul')){
            // menghapus data sebelumnya
            if ($request->oldSampul){
                Storage::delete($request->oldSampul);
            }
            $namacover = "$request->judul".".".$validateDate['sampul']->getClientOriginalExtension();
            $validateDate['sampul']  = $validateDate['sampul']->storeAs("buku-cover",$namacover);
        }
        Buku::where("id",$buku->id)->update($validateDate);
        return redirect('/buku')->with("success","Program has been Updated!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $this->authorize('admin');
        if ($buku->sampul){
            Storage::delete($buku->sampul);
        }
        Buku::destroy($buku->id);
        return redirect('/buku')->with("success","Jadwal has been Deleted!");
    }
}
