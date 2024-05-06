@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Edit Category</h1>
    <form method="POST" action="/category/{{ $category->id }}" class="p-4 md:p-5">
    @method('put')
        @csrf
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $category->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
             <div class="mb-5">
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $category->keterangan) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="hidden" name="oldfoto" value="{{ $category->foto }}">
                @if($category->foto)
                <img src="{{ asset('storage/' . $category->foto) }}" class="img-preview max-w-[200px]">
                @else
                <img class="img-preview max-w-[200px]">
                @endif
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Foto</label>
                <input class="@error('foto') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="user_avatar_help" id="foto" name="foto" type="file" onchange="previewImage()">   
             </div>
             @error('foto')
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
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
            
        }

      
    </script>
@endsection