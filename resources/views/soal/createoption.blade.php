@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Tambah Jawaban</h1>
    <form method="POST" action="{{ route('option.store')}}" class="p-4 md:p-5">
        @csrf
            <div class="col-span-2">
                <label for="soal_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Soal</label>
                <select id="soal" name="soal_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach($soal as $s)
                        <option value=" {{ $s->id }} ">{{ $s->soal }}</option>
                        @endforeach
                </select>
            </div>
            @error('soal_id')
            <div class="text-red-400">
            {{ $message }}
            </div>
            @enderror
            <div class="my-5">
                <label for="option" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option</label>
                <input type="text" id="option" name="option" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="my-5">
                <label for="point" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Point</label>
                <input type="number" id="point" name="point" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </div>
@endsection