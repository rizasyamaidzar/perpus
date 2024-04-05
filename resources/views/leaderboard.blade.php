@extends('layouts.main')
@section('content')

<div class="container mt-10">
<h1>Leaderboard Siswa</h1>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    NO
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Point
                </th>
                <th scope="col" class="px-6 py-3">
                    Badges
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach($rangking as $rank)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $rank->nama }}
                </td>
                <td class="px-6 py-4">
                    {{ $rank->kelas }}
                </td>
                <td class="px-6 py-4">
                    {{ $rank->point }}
                </td>
                <td class="px-6 py-4 flex items-center">
                    @if($rank->point > 200)
                        @php
                            $badgeCount = floor($rank->point / 200);
                        @endphp
                        @for($i = 0; $i < $badgeCount; $i++)
                            <img src="../assets/img/curved-images/badge.png" alt="Badge" class="h-8 w-8">
                        @endfor
                    @else
                        No badges
                    @endif
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>
</div>



</div>

@endsection