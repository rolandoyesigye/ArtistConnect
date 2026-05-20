@php
    $dashboardRoute = 'dashboard';
    if (auth()->check()) {
        if (auth()->user()->hasRole('artist')) {
            $dashboardRoute = 'artist.dashboard';
        } elseif (auth()->user()->hasRole('organizer')) {
            $dashboardRoute = 'organizer.dashboard';
        }
    }
@endphp

<header
    x-data="{ open: false }"
    class="bg-[#0c0f1a] text-white font-mono text-sm fixed w-full z-20"
>
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="ArtistConnect logo" class="w-5 h-5" />
            <span class="font-semibold">ArtistConnect</span>
        </a>

        <button
            type="button"
            class="md:hidden p-2 -mr-2"
            aria-label="Toggle menu"
            @click="open = !open"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <nav class="hidden md:flex items-center gap-4">
            @auth
                <a href="{{ route($dashboardRoute) }}" class="text-white hover:underline">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:underline">Log out</button>
                </form>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-white hover:underline">Log in</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-700 transition px-4 py-2 rounded-full text-white font-medium">
                        Sign up
                    </a>
                @endif
            @endauth
        </nav>
    </div>

    <div x-show="open" x-cloak class="md:hidden bg-[#0c0f1a] border-t border-gray-800 px-4 py-3 space-y-2">
        @auth
            <a href="{{ route($dashboardRoute) }}" class="block py-2 text-white hover:underline">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2 text-white hover:underline">Log out</button>
            </form>
        @else
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="block py-2 text-white hover:underline">Log in</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block py-2 text-white hover:underline">Sign up</a>
            @endif
        @endauth
    </div>
</header>

<div class="h-[64px]"></div>
