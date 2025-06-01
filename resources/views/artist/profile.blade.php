<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artist->stage_name }} - Artist Profile</title>
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
                            <a href="{{ route('home') }}" class="text-[#8ca34b] font-bold text-xl">
                                ArtistConnect
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <!-- Artist Profile Section -->
                <div class="bg-[#f8f3d4] rounded-lg shadow-lg overflow-hidden">
                    <!-- Cover Photo -->
                    <div class="h-48 bg-[#b6c47a] relative">
                        @if($artist->cover_photo)
                            <img src="{{ Storage::url($artist->cover_photo) }}" alt="Cover Photo" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <!-- Profile Info -->
                    <div class="px-6 py-8">
                        <div class="flex flex-col md:flex-row items-center md:items-start">
                            <!-- Profile Picture -->
                            <div class="md:mr-8 mb-4 md:mb-0">
                                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#f8f3d4] -mt-20 bg-white">
                                    <img src="{{ Storage::url($artist->profile_photo) }}" 
                                         alt="{{ $artist->stage_name }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </div>

                            <!-- Basic Info -->
                            <div class="flex-1 text-center md:text-left">
                                <h1 class="text-3xl font-bold text-[#6b6b4e]">{{ $artist->stage_name }}</h1>
                                <p class="text-[#8ca34b] mt-1">{{ $artist->nationality }}</p>
                                
                                <!-- Stats -->
                                <div class="flex justify-center md:justify-start space-x-8 mt-4">
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#6b6b4e]">{{ $artist->likes_count ?? 0 }}</p>
                                        <p class="text-sm text-[#6b6b4e]">Likes</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#6b6b4e]">{{ $artist->followers_count ?? 0 }}</p>
                                        <p class="text-sm text-[#6b6b4e]">Followers</p>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-2xl font-bold text-[#6b6b4e]">{{ $artist->bookings_count ?? 0 }}</p>
                                        <p class="text-sm text-[#6b6b4e]">Bookings</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 md:mt-0 flex space-x-4">
                                <button class="bg-[#8ca34b] text-white px-6 py-2 rounded-full hover:bg-[#7a8f3d] transition">
                                    Follow
                                </button>
                                <button class="border border-[#8ca34b] text-[#8ca34b] px-6 py-2 rounded-full hover:bg-[#8ca34b] hover:text-white transition">
                                    Message
                                </button>
                            </div>
                        </div>

                        <!-- Bio Section -->
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-[#6b6b4e] mb-4">About</h2>
                            <p class="text-[#6b6b4e] leading-relaxed">{{ $artist->bio }}</p>
                        </div>

                        <!-- Music Section -->
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-[#6b6b4e] mb-4">Music</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @forelse($artist->music as $track)
                                    <div class="bg-white rounded-lg p-4 shadow">
                                        <h3 class="font-medium text-[#6b6b4e]">{{ $track->title }}</h3>
                                        <p class="text-sm text-[#8ca34b]">{{ $track->genre }}</p>
                                        <audio controls class="w-full mt-2">
                                            <source src="{{ Storage::url($track->file_path) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                @empty
                                    <p class="text-[#6b6b4e]">No music uploaded yet.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Upcoming Events -->
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-[#6b6b4e] mb-4">Upcoming Events</h2>
                            <div class="space-y-4">
                                @forelse($artist->upcomingEvents as $event)
                                    <div class="bg-white rounded-lg p-4 shadow">
                                        <h3 class="font-medium text-[#6b6b4e]">{{ $event->title }}</h3>
                                        <p class="text-sm text-[#8ca34b]">{{ $event->date->format('F j, Y') }}</p>
                                        <p class="text-sm text-[#6b6b4e] mt-1">{{ $event->venue }}</p>
                                    </div>
                                @empty
                                    <p class="text-[#6b6b4e]">No upcoming events scheduled.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 