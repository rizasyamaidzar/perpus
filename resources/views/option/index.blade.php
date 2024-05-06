@extends('layouts.main')
@section('link')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
@endsection
@section('content')



<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-xl font-bold text-gray-500 dark:text-white">{{$buku->judul}}</h5>
    <p class="mb-5 text-3xl text-gray-900">{{ $soal->soal }}</p>
    <!-- Modal toggle -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    Add Option
    </button>
    <a href="/soal" class="block text-white bg-red-700 w-24 my-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Back</a>
</div>






<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Jawaban
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form method="POST" action="{{ route('option.store')}}">
                    @csrf
                    <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                    <div>
                        <label for="option" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Option</label>
                        <input type="text" name="option" id="option" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="point" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Point</label>
                        <input type="number" name="point" id="point" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> 


<!-- start option -->
<div class="relative overflow-x-auto p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Option
                </th>
                <th scope="col" class="px-6 py-3">
                    Point
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($option as $op)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                {{ $op->option }}
                </td>
                <td class="px-6 py-4">
                {{ $op->point}}
                </td>
                <td class="px-6 py-4 flex items-center">
                @can('admin')
                <!-- Edit Action -->
                     <a href="/option/{{ $op->id }}/edit" class="m-2">Edit
                        <i class="ml-auto mx-2 cursor-pointer fas fa-pencil-alt text-green-700" data-target="tooltip_trigger" data-placement="top"></i>
                    </a>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-sm">
                        Edit 
                        <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                <!-- end edit action -->
                <!-- Hapus Action -->
                <form action="/option/{{ $op->id }}" method="post">
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
<!-- end option -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection