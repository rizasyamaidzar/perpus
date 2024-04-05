@extends('layouts.main')
@section('content')

<div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800">
    <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
        <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">

            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mt-5">Ulasan Pilihan Ganda Buku : {{ $buku }}</h3>
            <p class="my-4">Total Point : {{ $total }}</p>
        </blockquote>
    </figure>
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Soal
                </th>
                <th scope="col" class="px-6 py-3">
                    Point
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($soal_result as $sr)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{ $sr->soal->soal }}
                </th>
                <td class="px-6 py-4">
                    {{ $sr->point }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
<a href="/pengembalian">
    <h2 class="text-white text-center bg-red-500 p-2 rounded-lg text-lg mt-5">Back</h2>
</a>

@endsection
