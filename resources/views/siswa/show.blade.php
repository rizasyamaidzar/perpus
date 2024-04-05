@extends('layouts.main')
@section('content')

<div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('{{ asset('storage/' . $siswa->foto) }}'); background-position-y: 50%">
          <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
        </div>
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
              <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="{{ asset('storage/' . $siswa->foto) }}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
              </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
              <div class="h-full">
                <h5 class="mb-1"> {{ $siswa->nama }} </h5>
                <p class="mb-0 font-semibold leading-normal text-sm">Kelas : {{ $siswa->kelas }}</p>
                <p class="mb-0 font-semibold leading-normal text-sm">NISN  : {{ $siswa->nisn }}</p>
              </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
              <div class="relative right-0">
              <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex rounded-xl text-white transition-all duration-200">
                <img src="{{ asset('storage/' . $siswa->foto) }}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
              </div>
              </div>
            </div>

            

          </div>
          <!-- biodata lengkap -->
          <ul class="flex flex-col pl-0 mb-0 mt-6 rounded-lg">
            <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong class="text-slate-700">Jenis Kelamin :</strong> &nbsp; {{ $siswa->jenis_kelamin }}</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Tempat Tanggal Lahir : </strong> &nbsp; {{ $siswa->tempat_lahir }} , {{ $siswa->tanggal }}</li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong class="text-slate-700">Point :</strong> &nbsp; {{ $siswa->point }}</li>
            <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
            </li>
            </ul>
            <!-- end biodata lengkap -->
            <a href="/siswa" class="bg-red-500 p-2 text-white rounded-lg mt-10 text-center">kembali</a>
        </div>
      </div>
@endsection