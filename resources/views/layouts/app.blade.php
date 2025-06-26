<!DOCTYPE html>
<html lang="id">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMPN 44 Semarang - Company Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- CSRF Token (untuk fetch manual) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Laravel JS Global Config -->
    <script>
      window.Laravel = {
        loginUrl: "{{ route('login') }}",
        logoutUrl: "{{ route('logout') }}",
        csrfToken: "{{ csrf_token() }}"
      };
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
  </head>

  <body class="flex flex-col min-h-screen bg-[#f8f8f8] font-sans">

    @include('partials.header')
    @include('partials.navbar')

    <main class="flex-grow container mx-auto p-6 my-8 bg-white rounded-lg shadow-xl">
      @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
  </body>

</html>
