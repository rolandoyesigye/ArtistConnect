<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen bg-[#ede2c0]">
        <!-- Navigation -->
        <nav class="bg-[#f8f3d4] border-b border-[#e2d9b0]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('artist.dashboard') }}" class="text-[#8ca34b] font-bold text-xl">
                                ArtistConnect
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('artist.dashboard') }}" class="border-[#b6c47a] text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Bookings
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Music
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Analytics
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" type="button" class="bg-[#f8f3d4] flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#b6c47a]" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    @if(auth()->user()->artist && auth()->user()->artist->profile_photo)
                                        <img class="h-8 w-8 rounded-full" src="{{ Storage::url(auth()->user()->artist->profile_photo) }}" alt="{{ auth()->user()->name }}">
                                    @else
                                        <div class="h-8 w-8 rounded-full bg-[#b6c47a] flex items-center justify-center text-white font-semibold">
                                            {{ auth()->user()->initials() }}
                                        </div>
                                    @endif
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-[#f8f3d4] ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]">Settings</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="px-4 py-6 sm:px-0">
                <div class="bg-[#f8f3d4] rounded-lg shadow-lg p-6">
                    <h1 class="text-2xl font-bold text-[#6b6b4e] mb-4">
                        Welcome, {{ auth()->user()->artist->stage_name ?? auth()->user()->name }}!
                    </h1>
                    <p class="text-[#6b6b4e]">
                        Manage your bookings, share your music, and track your performance.
                    </p>
                </div>
            </div>

            @if(auth()->user()->artist)
                <!-- Quick Actions -->
                <div class="mt-8 px-4 sm:px-0">
                    <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <a href="#" class="bg-[#f8f3d4] rounded-lg shadow-lg p-6 hover:bg-[#e2d9b0] transition">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-[#b6c47a] rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-[#6b6b4e]">Upload Music</h3>
                                    <p class="mt-1 text-sm text-[#6b6b4e]">Share your latest tracks</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="bg-[#f8f3d4] rounded-lg shadow-lg p-6 hover:bg-[#e2d9b0] transition">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-[#b6c47a] rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-[#6b6b4e]">View Bookings</h3>
                                    <p class="mt-1 text-sm text-[#6b6b4e]">Check your upcoming events</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="bg-[#f8f3d4] rounded-lg shadow-lg p-6 hover:bg-[#e2d9b0] transition">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-[#b6c47a] rounded-md p-3">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-[#6b6b4e]">View Analytics</h3>
                                    <p class="mt-1 text-sm text-[#6b6b4e]">Track your performance</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="mt-8 px-4 sm:px-0">
                    <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Your Stats</h2>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="bg-[#f8f3d4] rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-bold text-[#8ca34b]">{{ $likes ?? 0 }}</h3>
                            <p class="text-[#6b6b4e]">Total Likes</p>
                        </div>
                        <div class="bg-[#f8f3d4] rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-bold text-[#8ca34b]">{{ $followers ?? 0 }}</h3>
                            <p class="text-[#6b6b4e]">Followers</p>
                        </div>
                        <div class="bg-[#f8f3d4] rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-bold text-[#8ca34b]">{{ $bookings ?? 0 }}</h3>
                            <p class="text-[#6b6b4e]">Monthly Bookings</p>
                        </div>
                    </div>
                </div>

                <!-- Calendar Section -->
                <div class="mt-8 px-4 sm:px-0">
                    <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Upcoming Bookings</h2>
                    <div class="bg-[#f8f3d4] rounded-lg shadow-lg p-6">
                        <div id="calendar"></div>
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <h3 class="text-lg font-medium text-[#6b6b4e] mb-2">Complete Your Artist Profile</h3>
                    <p class="text-[#6b6b4e] mb-4">You need to complete your artist profile to access the dashboard.</p>
                    <a href="{{ route('artist.register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#8ca34b] hover:bg-[#7a8f3d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#b6c47a]">
                        Complete Profile
                    </a>
                </div>
            @endif
        </main>
    </div>

    @if(auth()->user()->artist)
    <!-- Calendar Scripts -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    // Add your booking events here
                    // Example:
                    // {
                    //     title: 'Booking at Venue X',
                    //     start: '2024-06-01',
                    //     end: '2024-06-02'
                    // }
                ]
            });
            calendar.render();
        });
    </script>
    @endif
</body>
</html>
