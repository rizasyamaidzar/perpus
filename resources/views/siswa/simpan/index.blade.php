@extends('layouts.main')
@section('content')
<div class="container m-12">
<h1>Data Buku</h1>
<div class="relative overflow-x-auto p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Sampul
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Rak
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah
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
            @foreach($simpan as $b)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $b->buku->sampul) }}" width="50px" height="50px">
                </td>
                <td class="px-6 py-4">
                {{ $b->buku->judul }}
                </td>
                <td class="px-6 py-4">
                {{ $b->buku->rak_id }}
                </td>
                <td class="px-6 py-4">
                {{ $b->buku->category_id }}
                </td>
                <td class="px-6 py-4">
                {{ $b->buku->jumlah }}
                </td>
                <td class="px-6 py-4">
                <div class="visible-print text-center">
                        {!! QrCode::size(100)->generate($b->buku->isbn); !!}
                        <p>Scan me to return to the original page.</p>
                </div>
                </td>
                <td class="px-6 py-4 flex items-center">
                    <!-- View Action -->
                    <a href="/simpan/{{ $b->id }}">
                    <i class="ml-auto cursor-pointer fas fa-eye text-blue-700 mx-2" data-target="tooltip_trigger" data-placement="top"></i>
                    
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        View 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                    </a>
                <!-- end View action -->
                <!-- Hapus Action -->
                <form action="/simpan/{{ $b->id }}" method="post">
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>

@endsection