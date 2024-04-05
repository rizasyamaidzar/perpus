<?php

namespace App\Http\Controllers;

use App\Models\Soal_result;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Options;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoalResultController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // pengembalian_id
        $kuisSudahDikirim = Result::where('pengembalian_id', $request->pengembalian_id)->exists();
        if ($kuisSudahDikirim) {
            $user = Auth::user();
            $siswa = Siswa::where("user_id", $user->id)->first();
            if($user->role == 1){
                // $profil = Guru::where("user_id", $user->id)->first();
                $kembali = Pengembalian::with(['peminjaman','siswa'])->get();
            }
            else{
                $kembali = Pengembalian::with(['peminjaman','siswa'])->where("siswa_id", $siswa->id)->get();
                
    
            }
            // @dd($kembali);
            return view('pengembalian.index',[
                'kembali' => $kembali,
                'title' => 'Pengembalian',
                'sudah' => $kuisSudahDikirim
            ]);
        }
        else{
        $options = Options::find(array_values($request->input('questions')));
        $total = $options->sum('point');
        $user = Auth::user();
        $siswa = Siswa::where("user_id", $user->id)->first();
        // update point siswa
        $point = $siswa->point;
        $point +=$total;  
        Siswa::where("id",$siswa->id)->update(['point' => $point]);
        // End update point siswa

        
        $result = Result::create([
            "user_id" => $user->id,
            "pengembalian_id" => $request->pengembalian_id,
            "total_point" => $total,
        ]);
        $newResult = $result->id;
        foreach ($options as $op) {
            // Simpan entri baru dalam database
            Soal_result::create([
                'result_id' => $newResult,
                'soal_id' => $op->soal_id,
                'option_id' => $op->id,
                'point' => $op->point,
            ]);
        }
        
        $soal_result = Soal_result::with('soal')->where('result_id',$newResult)->get();
        $buku = $soal_result->first();
        $bukuu = $buku->soal->buku->judul;
        return view('soalresult.show',[
            'title' => 'show',
            'soal_result' => $soal_result,
            'total' => $total,
            'buku' => $bukuu

        ]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pengembalian = Pengembalian::with('peminjaman')->where('id',$id)->first();
        $soal_id = $pengembalian->peminjaman->buku->id;
        $soal = Buku::where('id',$soal_id)->with(['soal' => function ($query) {
            $query->inRandomOrder()
                ->with(['options' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
        ->whereHas('soal')
        ->get();
        
    return view('soalresult.index', [
        'soal' => $soal,
        'title' => 'Soal Result',
        'id' => $id,
        ]
    );
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal_result $soal_result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoal_resultRequest $request, Soal_result $soal_result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal_result $soal_result)
    {
        //
    }
}
