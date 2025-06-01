<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body>
<!-- Navbar -->
<header class="bg-[#0c0f1a] text-white font-mono text-sm fixed w-full z-10">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    
    <!-- Logo -->
    <div class="flex items-center gap-2">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-5 h-5" />
      <span class="font-semibold">ArtistConnect</span>
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-4">
      <!-- Theme Toggle -->
      <button class="flex items-center gap-1 bg-[#f8e8c0] text-blue-700 font-medium px-3 py-1 rounded-md shadow hover:bg-[#f2e3ba] transition">
        <span>🔆</span>
        <span>Light</span>
      </button>

      <!-- Log In -->
      @if (Route::has('login'))
            <a href="{{ route('login') }}" class="text-white hover:underline">
                Log in
            </a>
        @endif

      <!-- Register -->
      @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-white hover:underline">
                Register
            </a>
        @endif
    </div>

  </div>
</header>


