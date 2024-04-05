@extends('layouts.main')
@section('content')

<div class="container mt-10">
    <h2>List Daftar Buku</h2>
   <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
        @foreach($buku as $b)
        <div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg max-w-[255px] max-h-[200px]  mx-auto" width="255px" height="200px" src="{{ asset('storage/' . $b->sampul) }}" alt="" />
                </a>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$b->judul}}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Stok : {{$b->jumlah}}</p>
                    <div class="flex items-center">
                    <a href="daftarbuku/{{$b->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg">
                        View Detail
                    </a>
                    <form method="POST" action="{{ route('daftarbuku.store')}}" class="p-4 md:p-5">
                    @csrf
                    <input type="text" value="{{$b->id}}" name="buku_id" hidden>
                    <button class="bg-slate-500 text-white p-2 rounded-lg" onclick="return confirm('Are you sure?')" type="submit">Simpan</button>
                    </form> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div>
   </div>
</div>
@endsection