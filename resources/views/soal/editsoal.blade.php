@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Edit Soal</h1>
    <form method="POST" action="/soal/{{ $soal->id }}" class="p-4 md:p-5">
    @method('put')
        @csrf
            <div class="col-span-2">
                <label for="buku_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select buku_id</label>
                <select id="buku_id" name="buku_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach($buku as $ct)
                        <option value=" {{ $ct->id }}" value="{{ old('buku_id', $ct->buku_id) }}">{{ $ct->judul }}</option>
                        @endforeach
                </select>
            </div>
             <div class="mb-5">
                <label for="soal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soal</label>
                <input type="soal" id="soal" name="soal" value="{{ old('soal', $soal->soal) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
           
            <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </div>
@endsection