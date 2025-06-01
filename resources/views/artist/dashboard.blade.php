<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex space-x-8">
                        <a href="{{ route('artist.dashboard') }}" class="inline-flex items-center px-1 pt-1 text-gray-900">Dashboard</a>
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-gray-500 hover:text-gray-900">Bookings</a>
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-gray-500 hover:text-gray-900">Music</a>
                        <a href="#" class="inline-flex items-center px-1 pt-1 text-gray-500 hover:text-gray-900">Analytics</a>
                    </div>

                    <div class="flex items-center">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                                <span class="mr-2">{{ auth()->user()->name }}</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
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
            <div class="px-4 py-6 sm:px-0">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h2>
                    
                    @if(auth()->user()->artist)
                        <!-- Artist Profile Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <h3 class="text-lg font-medium mb-2">Profile Information</h3>
                                <div class="space-y-2">
                                    <div class="mb-4">
                                        <span class="font-medium block mb-2">Profile Picture</span>
                                        <img src="{{ Storage::url(auth()->user()->artist->profile_photo) }}" 
                                             alt="Profile Picture" 
                                             class="w-32 h-32 rounded-full object-cover border-2 border-indigo-600">
                                    </div>
                                    <p><span class="font-medium">Stage Name:</span> {{ auth()->user()->artist->stage_name }}</p>
                                    <p><span class="font-medium">Gender:</span> {{ auth()->user()->artist->gender }}</p>
                                    <p><span class="font-medium">Nationality:</span> {{ auth()->user()->artist->nationality }}</p>
                                    <p><span class="font-medium">Address:</span> {{ auth()->user()->artist->address }}</p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium mb-2">Bio</h3>
                                <p class="text-gray-600">{{ auth()->user()->artist->bio }}</p>
                            </div>
                        </div>

                        <!-- Stats Section -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-indigo-600 text-white rounded-lg p-4 text-center hover:bg-indigo-700 transition">
                                <h3 class="font-medium text-xl">{{ $likes ?? 0 }}</h3>
                                <p class="text-sm text-indigo-200">Total Likes</p>
                            </div>
                            <div class="bg-green-600 text-white rounded-lg p-4 text-center hover:bg-green-700 transition">
                                <h3 class="font-medium text-xl">{{ $followers ?? 0 }}</h3>
                                <p class="text-sm text-green-200">Followers</p>
                            </div>
                            <div class="bg-purple-600 text-white rounded-lg p-4 text-center hover:bg-purple-700 transition">
                                <h3 class="font-medium text-xl">{{ $bookings ?? 0 }}</h3>
                                <p class="text-sm text-purple-200">Monthly Bookings</p>
                            </div>
                        </div>

                        <!-- Calendar Section -->
                        <div class="mt-8">
                            <h3 class="text-lg font-medium mb-4">Upcoming Bookings</h3>
                            <div class="bg-white border rounded-lg p-4">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Complete Your Artist Profile</h3>
                            <p class="text-gray-600 mb-4">You need to complete your artist profile to access the dashboard.</p>
                            <a href="{{ route('artist.register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Complete Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
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
