@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Tambah Buku</h1>
    <form method="POST" action="/buku/{{ $buku->id }}"  enctype="multipart/form-data" class="p-4 md:p-5">
        @method('put')    
        @csrf
            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('judul')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
            <div class="relative z-0 w-full mb-5 group">
                <input type="hidden" name="oldSampul" value="{{ $buku->sampul }}">
                @if($buku->sampul)
                <img src="{{ asset('storage/' . $buku->sampul) }}" class="img-preview max-w-[200px]">
                @else
                <img class="img-preview max-w-[200px]">
                @endif
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="sampul">Sampul</label>
                <input class="@error('sampul') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="user_avatar_help" id="sampul" name="sampul" type="file" onchange="previewImage()">   
             </div>
             @error('sampul')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isbn</label>
                <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $buku->isbn) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('isbn')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="pengarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('pengarang')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('pengarang')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                <input type="number" id="tahun" name="tahun" value="{{ old('tahun', $buku->tahun) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('tahun')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Buku</label>
                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $buku->jumlah) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('jumlah')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
             <div class="mb-5">
                <label for="tebal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman</label>
                <input type="number" id="tebal" name="tebal" value="{{ old('tebal', $buku->tebal) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            @error('tebal')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
            <div class="col-span-2">
                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Level</label>
                <select id="level" name="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach($category as $ct)
                        <option value=" {{ $ct->id }}" value="{{ old('category_id', $buku->category_id) }}">{{ $ct->nama }}</option>
                        @endforeach
                </select>
            </div>
            @error('categoty_id')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror
            <div class="col-span-2">
                <label for="rak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Rak</label>
                <select id="rak" name="rak_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value=" 1 ">ad</option>
                    <option value=" 2 ">adsd</option>
                </select>
            </div>
            @error('rak_id')
            <div class="text-red-400">
                {{ $message }}
            </div>
            @enderror


            <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })

        function previewImage(){
        const image = document.querySelector('#sampul');
        const imgPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
            
        }

      
    </script>
@endsection