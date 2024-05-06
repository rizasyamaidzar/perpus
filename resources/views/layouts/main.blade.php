<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    @include('layouts.partial.link')
    @yield('link')
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @include('layouts.partial.sidebar')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    @include('layouts.partial.navbar')  
    
    @yield('content')

    <div class="mt-44">
        @include('layouts.partial.footer')
    </div>  
    </main>

  </body>
  @include('layouts.partial.script')
  @yield('script')
</html>
