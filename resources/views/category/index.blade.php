@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Category</h1>
<a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="/category/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Category</a>
                     
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
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Foto
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $ct)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{$ct->nama}}
                </td>
                <td class="px-6 py-4">
                    {{$ct->keterangan}}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $ct->foto) }}" width="50px" height="50px">
                </td>
                <td class="px-6 py-4 flex items-center">
                @can('admin')
                <!-- Edit Action -->
                    <a href="/category/{{ $ct->id }}/edit">
                        Edit
                    <i class="ml-auto mx-2 cursor-pointer fas fa-pencil-alt text-green-700" data-target="tooltip_trigger" data-placement="top"></i>
                    </a>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        Edit 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                <!-- end edit action -->
                <!-- Hapus Action -->
                <form action="/category/{{ $ct->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')">
                        Delete
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
<!-- End Data Category -->

<!-- Start Rak -->

<h1>Data Rak</h1>
<a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="/rak/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Rak</a>
                     
<div class="relative overflow-x-auto p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable2">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($rak as $r)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{$r->nama}}
                </td>
                <td class="px-6 py-4">
                    {{$r->keterangan}}
                </td>
                <td class="px-6 py-4 flex items-center">
                @can('admin')
                <!-- Edit Action -->
                    <a href="/rak/{{ $r->id }}/edit">
                        Edit
                    <i class="ml-auto mx-2 cursor-pointer fas fa-pencil-alt text-green-700" data-target="tooltip_trigger" data-placement="top"></i>
                    </a>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        Edit 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                <!-- end edit action -->
                <!-- Hapus Action -->
                <form action="/rak/{{ $r->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')">
                        Delete
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
<!-- End Rak  -->
</div>

@endsection
@section('script')
<script>
    $(document).ready( function(){
    $('#myTable2').DataTable();
    });
// enddatatable
 </script>

@endsection