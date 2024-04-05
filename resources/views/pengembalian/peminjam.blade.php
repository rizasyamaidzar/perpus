@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Peminjam</h1>                 
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
                @can('admin')
                <!-- Hapus Action -->
                <form action="{{ route('pengembalian.store')}}" method="post">
                    @csrf
                    <input type="number" name="peminjaman_id" value="{{ $p->id }}" hidden >
                    <button onclick="return confirm('Are you sure?')" type="submit">
                        <i class="ml-auto cursor-pointer far fas fa-undo text-white bg-slate-500 rounded-lg p-5" data-target="tooltip_trigger" data-placement="top"></i>
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