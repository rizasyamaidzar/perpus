@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Tambah Soal</h1>
    <form method="POST" action="{{ route('soal.store')}}" class="p-4 md:p-5">
        @csrf
            <div class="col-span-2">
                <label for="buku_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Buku</label>
                <select id="buku" name="buku_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach($buku as $b)
                        <option value=" {{ $b->id }} ">{{ $b->judul }}</option>
                        @endforeach
                </select>
            </div>
            @error('categoty_id')
            <div class="text-red-400">
            {{ $message }}
            </div>
            @enderror
            <div class="my-5">
                <label for="soal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal</label>
                <input type="text" id="soal" name="soal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </div>
@endsection