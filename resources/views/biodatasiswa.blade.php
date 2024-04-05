@extends('layouts.main')
@section('content')

<div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('{{ asset('storage/' . $profil->foto) }}'); background-position-y: 50%">
          <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
        </div>
        
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
        <form method="POST" action="/profil/{{ $profil->id }}"  enctype="multipart/form-data" class="p-4 md:p-5">    
              @method('put')
              @csrf
              <img class="img-preview max-w-[200px]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Foto</label>
                <input class="@error('foto') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="user_avatar_help" id="foto" name="foto" type="file" onchange="previewImage()">    
              <button type="submit" class="mt-5 bg-blue-700 hover:text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form> 
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
              <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="{{ asset('storage/' . $profil->foto) }}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
                
              </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
              <div class="h-full">
                <h5 class="mb-1"> {{ $profil->nama }} </h5>
                <p class="mb-0 font-semibold leading-normal text-sm">Kelas : {{ $profil->kelas }}</p>
                <p class="mb-0 font-semibold leading-normal text-sm">NISN  : {{ $profil->nisn }}</p>
              </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
              <div class="relative right-0">
              <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex rounded-xl text-white transition-all duration-200">
                   <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate('$profil->nisn'); !!}
                            <p>Scan me to return to the original page.</p>
                    </div>
                    
              </div>
              </div>
            </div>

            

          </div>
          <!-- biodata lengkap -->
          <ul class="flex flex-col pl-0 mb-0 mt-6 rounded-lg">
            <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Jenis Kelamin :</strong> &nbsp; {{ $profil->jenis_kelamin }}</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Tempat Tanggal Lahir : </strong> &nbsp; {{ $profil->tempat_lahir }} , {{ $profil->tanggal }}</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Point :</strong> &nbsp; {{ $profil->point }}</li>
            <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
            </li>
            </ul>
            <!-- end biodata lengkap -->
          
        </div>
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