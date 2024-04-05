@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Pengembalian</h1>
@can('admin')
<a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="pengembalian/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Pengembalian</a>
@endcan        
<div class="relative overflow-x-auto p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal_Kembali
                </th>
                <th scope="col" class="px-6 py-3">
                    Denda
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @foreach($kembali as $k)   
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{ $k->peminjaman->siswa->nama  }}
                </td>
                <td class="px-6 py-4">
                   {{ $k->peminjaman->buku->judul }}
                </td>
                <td class="px-6 py-4">
                    {{ $k->tgl_kembali}}
                </td>
                <td class="px-6 py-4">
                    {{ $k->denda}}
                </td>
                <td class="px-6 py-4">
                <!-- View Action -->
                <a href="/pengembalian/{{ $k->id }}/">
                    <i class="mx-2 ml-auto cursor-pointer fas fa-eye text-blue-700 text-center" data-target="tooltip_trigger" data-placement="top"></i>
                    
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        View 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                </a>
                <!-- end View action -->
                <!-- Ulasan Action -->
                @cannot('admin')

                @php
                    $kuisSudahDikirim = App\Models\Result::where('pengembalian_id', $k->id)->exists();
                @endphp
                @if($kuisSudahDikirim != 1)
                <a href="/soalresult/{{ $k->id }}/">
                    <h2 class="text-sm bg-green-500 text-center p-2 text-white rounded-lg"> Ulas </h2>
                </a>
                @endif
                @endcan
                <!-- end Ulasan action -->
                @can('admin')
                <!-- Hapus Action -->
                <form action="/pengembalian/{{ $k->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')">
                        <i class="ml-auto cursor-pointer far fa-trash-alt text-red-700" data-target="tooltip_trigger" data-placement="top"></i>
                        <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                            Hapus
                            <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                        </div>
                    </button>
                </form>
                <!-- end Hapus action -->
                @endcan
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>


</div>

@endsection