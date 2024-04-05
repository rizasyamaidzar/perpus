@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Peminjaman</h1>
@can('admin')
<a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="/peminjaman/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Peminjaman</a>
@endcan                   
<div class="relative overflow-x-auto p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Peminjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal_Pinjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal_Kembali
                </th>
                <th scope="col" class="px-6 py-3">
                    Kode
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $p)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="px-6 py-4">
                    {{ $p->siswa->nama }}    
                </td>
                <td class="px-6 py-4">
                    {{ $p->buku->judul }}      
                </td>
                <td class="px-6 py-4">
                    {{ $p->tgl_pinjam }}
                </td>
                <td class="px-6 py-4">
                    {{ $p->tgl_kembali }}
                </td>
                <td class="px-6 py-4">
                    <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate($p->id); !!}
                            <p>Scan me to return to the original page.</p>
                    </div>
                </td>
                <td class="px-6 py-4 flex items-center">
                <!-- View Action -->
                <a href="/peminjaman/{{ $p->id }}/">
                    <i class="mx-2 ml-auto cursor-pointer fas fa-eye text-blue-700" data-target="tooltip_trigger" data-placement="top"></i>
                    
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        View 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                    </a>
                <!-- end View action -->
                @can('admin')
                <!-- Hapus Action -->
                <form action="/peminjaman/{{ $p->id }}" method="post">
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