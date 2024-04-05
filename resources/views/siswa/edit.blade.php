@extends('layouts.main')
@section('content')
    <div class="m-10">
    <h1 class="text-center">Form Edit Siswa</h1>
    <form method="POST" action="/siswa/{{ $siswa->id }}"  enctype="multipart/form-data" class="p-4 md:p-5">
        @method('put')    
        @csrf
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nisn</label>
                <input type="number" id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis_Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">         
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
               
            </div>
            <div class="mb-5">
                <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="mb-5">
                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $siswa->tanggal) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="hidden" name="oldFoto" value="{{ $siswa->foto }}">
                @if($siswa->foto)
                <img src="{{ asset('storage/' . $siswa->foto) }}" class="img-preview max-w-[200px]">
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
            
            <input type="number" name="user_id" value="$siswa->user_id" hidden>
            <input type="number" name="point" value="$siswa->point" hidden>

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