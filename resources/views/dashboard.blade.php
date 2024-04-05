@extends('layouts.main')
@section('content')
<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
  <h2>Selamat Datang, {{ $guru->nama ?? 'Admin'  }} </h2>
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <a href="/category"> 
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg font-semibold leading-normal">Category</p>
                      <h5 class="mb-0 font-bold text-2xl">
                        {{$category}}
                      
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-tag text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>

          <!-- card2 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <a href="/rak">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg font-semibold leading-normal">Rak</p>
                      <h5 class="mb-0 font-bold text-2xl">
                      {{$rak}}
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>    
          </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <a href="/buku">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-;g font-semibold leading-normal">Buku</p>
                      <h5 class="mb-0 font-bold text-2xl">
                        {{$buku}}
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-book-bookmark text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>

          <!-- card4 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <a href="/siswa">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg font-semibold leading-normal">Anggota</p>
                      <h5 class="mb-0 font-bold text-2xl">
                        {{$siswa}}
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-circle-08 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>

          <!-- card5 -->

          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/2 mt-10">
            <a href="peminjaman">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg font-semibold leading-normal">Peminjaman</p>
                      <h5 class="mb-0 font-bold text-2xl">
                        {{$peminjaman}}
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-ruler-pencil text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>

          <!-- card6 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/2 mt-10">
            <a href="/pengembalian">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 font-sans text-lg font-semibold leading-normal">Pengembalian</p>
                      <h5 class="mb-0 font-bold text-2xl">
                        {{$pengembalian}}
                      </h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-orange-700 to-grey-500">
                      <i class="ni leading-none ni-ui-04 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>

</div>
      <!-- end cards -->

@endsection