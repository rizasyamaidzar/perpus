@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Siswa</h1>
<a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="/siswa/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Siswa</a>

<!-- start import -->



<!-- Modal toggle -->
<form method="POST" action="/import"  enctype="multipart/form-data" class="p-4 md:p-5">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-green-800 to-green-700 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">import</button>
    </form>
     
<!-- end import -->
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
                    NISN
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis_kelamin
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Point
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
            @foreach($siswa as $s)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration}}
                </th>
                <td class="px-6 py-4">
                    {{$s->nama}}
                </td>
                <td class="px-6 py-4">
                    {{ $s->nisn }} 
                </td>
                <td class="px-6 py-4">
                    {{ $s->jenis_kelamin }}
                </td>
                <td class="px-6 py-4">
                    {{ $s->kelas }}
                </td>
                <td class="px-6 py-4">
                    {{ $s->point }}
                </td>
                <td class="px-6 py-4">
                    <div class="visible-print text-center">
                            {!! QrCode::size(100)->generate($s->nisn); !!}
                            <p>Scan me to return to the original page.</p>
                    </div>
                </td>
                <td class="px-6 py-4 flex items-center">
                <!-- View Action -->
                    <a href="/siswa/{{ $s->id }}/">
                    <i class="ml-auto cursor-pointer fas fa-eye text-blue-700" data-target="tooltip_trigger" data-placement="top"></i>
                    
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        View 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                    </a>
                <!-- end View action -->
                @can('admin')
                <!-- Edit Action -->
                     <a href="/siswa/{{ $s->id }}/edit" class="m-2">
                        <i class="ml-auto mx-2 cursor-pointer fas fa-pencil-alt text-green-700" data-target="tooltip_trigger" data-placement="top"></i>
                    </a>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        Edit 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                <!-- end edit action -->
                <!-- Hapus Action -->
                <form action="/siswa/{{ $s->id }}" method="post">
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

@section('script')
<script src="/path/to/flowbite/dist/flowbite.min.js"></script>
@endsection