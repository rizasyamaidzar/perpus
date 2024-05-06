<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Gate;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $rak = Rak::all();

        return view('category.index',[
            'category' => $category,
            'rak' => $rak,
            'title' => 'Category & Rak '
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create',[
            'title' => 'Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Memeriksa izin 'admin' menggunakan Gate
        if (Gate::allows('admin')) {
            // Jika pengguna memiliki izin 'admin', lanjutkan dengan menyimpan kategori
            $validatedData = $request->validate([
                "foto" => "image|file|max:2048",
                'nama' => 'required|string',
                'keterangan' => 'required|string',
            ]);
            if($request->file('foto')){
                $namacover = "$request->nama".".".$validatedData['foto']->getClientOriginalExtension();
                $validatedData['foto']  = $validatedData['foto']->storeAs("category-cover",$namacover);
            } 

            Category::create($validatedData);

            return redirect()->route('category.index')->with('success', 'Category created successfully.');
        } else {
            // Jika pengguna tidak memiliki izin 'admin', kembalikan respons 403 (Unauthorized)
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',[
            'category' => $category,
            'title' => 'Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validateDate = $request->validate([
            'nama' => 'required|string',
            'keterangan' => 'required|string',
            "foto" => "image|file|max:2048",
        ]);
        if($request->file('foto')){
            // menghapus data sebelumnya
            if ($request->oldfoto){
                Storage::delete($request->oldfoto);
            }
            $namacover = "$request->nama".".".$validateDate['foto']->getClientOriginalExtension();
            $validateDate['foto']  = $validateDate['foto']->storeAs("category-cover",$namacover);
        }
        Category::where("id",$category->id)->update($validateDate);

        return redirect('/category')->with("success","New Category has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->foto){
            Storage::delete($category->foto);
        }
        Category::destroy($category->id);
        return redirect('/category')->with("success","Jadwal has been Deleted!");
    }
}
