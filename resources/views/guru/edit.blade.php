@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Edit Admin</h1>
    <form method="POST" action="/admin/{{ $guru->id }}"  enctype="multipart/form-data" class="p-4 md:p-5">
        @method('put')    
        @csrf
        <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('guru', $guru->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nip</label>
                <input type="number" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis_Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">         
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
               
            </div>
            <input type="number" name="user_id" value="$guru->user_id" hidden>
            <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </div>
@endsection