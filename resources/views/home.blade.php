@extends('layouts.main')
@section('content')

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
</head>
<body>
  
<!-- <div class="bg-blue-700 grid grid-cols-2 px-10 mx-auto ">
    <div class="col-span-1">
    <h2 class="mx-3 my-auto text-white text-4xl font-bold">PERPUSTAKAAN DIGITAL SMPN 2 PULUNG</h2>
    </div>
    <div>
    <img src="../assets/img/murid.png" alt="" class="w-14 mx-5">
    </div>
</div> -->
<div class="flex flex-wrap lg:ml-16 bg-blue-300">
    <div class="self-center px-4 lg:w-1/2 flex-1 w-64">
    <h2 class="my-auto text-white text-4xl font-bold">PERPUSTAKAAN DIGITAL SMPN 2 PULUNG</h2>
    </div>
    <div class="w-full self-end px-4 lg:w-1/6 justify-end">
        <div class="mt-10">
            <img src="../assets/img/murid.png" alt="" class="max-w-full mx-auto" width="100px">  
        </div>
    </div>
</div>

<div class="flex flex-wrap lg:ml-16 my-5">
  <!-- tentang -->
  <div class="flex-auto w-72 ">
    <h2 class="mx-3 my-auto text-blue-300 text-2xl font-bold">APA YANG BERBEDA DARI PERPUSTAKAAN SEBELUMNYA?</h2>
    <div class="flex">
        <div class="mt-10 flex-auto w-72">
            <img src="../assets/img/tentang.png" alt="" class="max-w-full mx-auto" width="100px">  
        </div>
        <div class="text-blue-300 mx-5 my-auto">
          <p>Perpustkaan SMPN 2 Pulung menerapkan konsep gamifikasi yaitu perpustakaan yang menerapkan konsep-konsep atau elemen game dalam desain layanan untuk memberikan pengalaman berbeda di perpustakaan yang terkesan membosankan dan diharapkan dapat meningkatkan minat baca siswa</p>
        </div>
    </div>

    <!-- tentang poin -->
    <div class="flex justify-center">
        <div class="mt-10">
            <img src="../assets/img/poin.png" alt="" class="max-w-full mx-auto" width="100px">  
        </div>
        <div class="text-blue-300 my-auto flex-auto w-72 mx-10">
        <h2 class="my-auto text-blue-300 text-2xl font-bold">BAGAIMANA MEMPEROLEH POIN?</h2>
        <ul class="mx-5 list-decimal">
            <li>Meminjam Buku diPerpustakaan</li>
            <li>Meminjam Buku dengan level tinggi</li>
            <li>Mengembalikan Tepat Waktu</li>
            <li>Mengerjakan Ulasan</li>
          </ul>
        </div>
    </div>
    <!-- end tentang poin  -->

    <!-- tertinggi -->
    <div class="flex justify-center">
        <div class="mt-10">
            <img src="../assets/img/tinggi.png" alt="" class="max-w-full mx-auto" width="100px">  
        </div>
        <div class="text-blue-300 my-auto flex-auto w-72 mx-10">
        <h2 class="my-auto text-blue-300 text-2xl font-bold">APA KEUNTUNGAN MEMILIKI POIN TERTINGGI?</h2>
        <ul class="mx-5 list-decimal">
            <li>Memperoleh Reward Bulanan</li>
            <li>Memperoleh Badge tinggi</li>
            <li>Nama akak dipampang di perpustakaan</li>
          </ul>
        </div>
    </div>
    <!-- end tertinggi -->

  </div>
  <!-- end tentang -->


  <!-- bagian kategori -->
  <div class="flex-auto w-32">
    <h2 class="text-2xl text-blue-300 font-bold text-center">KATEGORI BUKU</h2>
    <!-- start kategori -->
    <div class="flex my-10">
        <div class="mt-10 flex-auto w-32">
            <img src="../assets/img/kategori.png" alt="" class="max-w-full mx-auto" width="1000px">  
        </div>

        <div class="text-blue-300 flex-auto w-72">
          @foreach($category as $ct)
          <ul class="list-none flex">
            <li><img src="{{ asset('storage/' . $ct->foto) }}" alt="" class="max-w-full mx-5" width="100px"> </li>
            <li class="my-auto text-2xl font-bold">{{$ct->nama}}</li>
          </ul>  
          @endforeach
        </div>

    </div>
    <!-- end kategori -->
    
    <!-- buku favorit -->
    <div class="flex flex-wrap lg:ml-16">
    <div class=" self-end px-4 lg:w-1/6 justify-center flex-auto w-72">
        <div class="mt-10">
          @if($buku)
           <a href="daftarbuku/{{ $buku->id}}"><img src="{{ asset('storage/' . $buku->sampul) }}" alt="" class="max-w-full mx-auto" width="100px"></a> 
          @endif
          </div>
    </div>
    <div class="self-center px-4 lg:w-1/2 flex-auto w-8">
    <h2 class="mx-3 my-auto text-red-600 text-4xl font-bold">Buku Terbaru</h2>
    </div>
  </div>

    <!-- end buku favorit  -->
  </div>
  <!-- end bagian kategori -->
  
</div>

  <div class="footer">
    <div class="bg-blue-300 text-white font-bold py-5">
    <ul class="list-none flex justify-center my-auto">
        <li><img src="../assets/img/ig.png" alt="" class="max-w-full mx-auto my-auto" width="40x"> </li>
        <li class="mx-5 my-auto">perpustakaansmp.2pulung</li>
        <li><img src="../assets/img/tiktok.png" alt="" class="max-w-full mx-auto my-auto" width="30px"> </li>
        <li class="mx-5 my-auto">perpustakaansmp.2pulung</li>
    </ul>
    </div>
  </div>
</body>
</html>

@endsection