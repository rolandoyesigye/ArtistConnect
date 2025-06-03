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
                            <a href="{{ route('organizer.dashboard') }}" class="text-[#8ca34b] font-bold text-xl">
                                ArtistConnect
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('organizer.dashboard') }}" class="border-[#b6c47a] text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Events
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Artists
                            </a>
                            <a href="#" class="border-transparent text-[#6b6b4e] hover:border-[#b6c47a] hover:text-[#8ca34b] inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Analytics
                            </a>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <div class="ml-3 relative">
                            <div>
                                <button type="button" class="bg-[#f8f3d4] flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#b6c47a]" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    @if(auth()->user()->organizer && auth()->user()->organizer->profile_photo)
                                        <img class="h-8 w-8 rounded-full" src="{{ Storage::url(auth()->user()->organizer->profile_photo) }}" alt="{{ auth()->user()->name }}">
                                    @else
                                        <div class="h-8 w-8 rounded-full bg-[#b6c47a] flex items-center justify-center text-white font-semibold">
                                            {{ auth()->user()->initials() }}
                                        </div>
                                    @endif
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-[#f8f3d4] ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                                <a href="#" class="block px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]" role="menuitem" tabindex="-1">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]" role="menuitem" tabindex="-1">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-[#6b6b4e] hover:bg-[#e2d9b0]" role="menuitem" tabindex="-1">Sign out</button>
                                </form>
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
                        Welcome, {{ auth()->user()->organizer->organization_name ?? auth()->user()->name }}!
                    </h1>
                    <p class="text-[#6b6b4e]">
                        Manage your events, connect with artists, and track your organization's performance.
                    </p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 px-4 sm:px-0">
                <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Quick Actions</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <a href="{{ route('organizer.events.create') }}" class="bg-[#f8f3d4] rounded-lg shadow-lg p-6 hover:bg-[#e2d9b0] transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-[#b6c47a] rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-[#6b6b4e]">Create Event</h3>
                                <p class="mt-1 text-sm text-[#6b6b4e]">Start planning your next event</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="bg-[#f8f3d4] rounded-lg shadow-lg p-6 hover:bg-[#e2d9b0] transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-[#b6c47a] rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-[#6b6b4e]">Find Artists</h3>
                                <p class="mt-1 text-sm text-[#6b6b4e]">Browse and connect with artists</p>
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
                                <p class="mt-1 text-sm text-[#6b6b4e]">Track your organization's performance</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8 px-4 sm:px-0">
                <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Recent Activity</h2>
                <div class="bg-[#f8f3d4] rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <p class="text-[#6b6b4e] text-center">No recent activity to display.</p>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="mt-8 px-4 sm:px-0">
                <h2 class="text-lg font-semibold text-[#6b6b4e] mb-4">Upcoming Events</h2>
                <div class="bg-[#f8f3d4] rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        @php
                            $upcomingEvents = \App\Models\Event::where('organizer_id', auth()->id())
                                ->where('date', '>=', now())
                                ->where('status', '!=', 'cancelled')
                                ->orderBy('date')
                                ->take(5)
                                ->get();
                        @endphp

                        @if($upcomingEvents->count() > 0)
                            <div class="space-y-6">
                                @foreach($upcomingEvents as $event)
                                    <div class="border-b border-[#e2d9b0] last:border-0 pb-6 last:pb-0">
                                        <div class="flex gap-4">
                                            <div class="flex-shrink-0">
                                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="h-24 w-24 object-cover rounded-lg">
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h3 class="text-lg font-medium text-[#6b6b4e]">{{ $event->title }}</h3>
                                                        <p class="text-sm text-[#8ca34b]">{{ $event->date->format('F j, Y g:i A') }}</p>
                                                        <p class="text-sm text-[#6b6b4e] mt-1">{{ $event->venue }}</p>
                                                    </div>
                                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                                        @if($event->status === 'draft') bg-yellow-100 text-yellow-800
                                                        @elseif($event->status === 'published') bg-green-100 text-green-800
                                                        @else bg-red-100 text-red-800 @endif">
                                                        {{ ucfirst($event->status) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-[#6b6b4e] text-center">No upcoming events scheduled.</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Dropdown menu functionality
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        userMenuButton.addEventListener('click', () => {
            const expanded = userMenuButton.getAttribute('aria-expanded') === 'true';
            userMenuButton.setAttribute('aria-expanded', !expanded);
            userMenu.classList.toggle('hidden');
        });

        // Close the dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenuButton.setAttribute('aria-expanded', 'false');
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

