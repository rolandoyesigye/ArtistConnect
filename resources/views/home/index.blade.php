<x-layouts.public>

<section class="bg-gradient-to-br from-[#100c2a] via-[#1d0c2a] to-[#0a092a] text-white px-4 py-24 md:py-32">
    <div class="text-center max-w-4xl mx-auto space-y-8">
        <div>
            <h1 class="text-4xl md:text-6xl font-bold tracking-tight leading-tight">
                Discover <span class="text-purple-500">Live Music</span><br />
                Everywhere
            </h1>
            <p class="text-gray-300 mt-4 text-lg">
                Find concerts, track your favorite artists, and never<br />
                miss a live show again.
            </p>
        </div>

        @guest
            <div class="flex justify-center gap-3 flex-wrap pt-2">
                <a href="{{ route('register') }}" class="px-6 py-3 rounded-full bg-indigo-600 hover:bg-indigo-700 transition text-white font-semibold shadow-md">
                    Get started
                </a>
                <a href="{{ route('login') }}" class="px-6 py-3 rounded-full border border-white/30 hover:border-white transition text-white font-semibold">
                    Log in
                </a>
            </div>
        @endguest
    </div>
</section>

<section class="bg-gradient-to-b from-[#0a092a] to-[#141229] py-16 px-4 text-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-2xl md:text-3xl font-semibold mb-10">Join Our Community</h2>

        <div class="grid gap-6 md:grid-cols-2 max-w-3xl mx-auto">
            <div class="bg-[#1b1a2e] rounded-xl border border-gray-600 p-6 flex flex-col items-center space-y-4">
                <div class="bg-[#2f2e4a] p-3 rounded-full">
                    <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10.55A4 4 0 1 0 14 17V7h4V3h-6z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Artist</h3>
                <p class="text-sm text-gray-400">Share your music & connect with fans</p>
                <a href="{{ route('artist.register') }}" class="bg-indigo-600 hover:bg-indigo-700 transition px-6 py-2 rounded-full text-white font-medium block text-center">
                    Join as Artist
                </a>
            </div>

            <div class="bg-[#1b1a2e] rounded-xl border border-gray-600 p-6 flex flex-col items-center space-y-4">
                <div class="bg-[#2f2e4a] p-3 rounded-full">
                    <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm0 18H5V9h14v12zm0-14H5V5h14v2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Organizer</h3>
                <p class="text-sm text-gray-400">Create & manage live events</p>
                <a href="{{ route('organizer.register') }}" class="bg-indigo-600 hover:bg-indigo-700 transition px-6 py-2 rounded-full text-white font-medium block text-center">
                    Join as Organizer
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-12 px-6 bg-white text-gray-800">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-semibold mb-2">Featured Concerts</h2>
        <p class="text-sm text-gray-600 mb-6">Upcoming events you won't want to miss</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($events as $event)
                <div class="rounded-xl border shadow-sm overflow-hidden bg-white">
                    <div class="relative h-40">
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <div class="absolute bottom-2 left-2 text-white font-mono text-sm">{{ $event->date->format('F j, Y g:i A') }}</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-700 mb-2">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $event->venue }}</p>
                        <span class="text-indigo-600 font-mono text-sm">UGX {{ number_format($event->budget, 0) }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">No upcoming events available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>


<section class="bg-gray-50 py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Featured Artists</h2>
        <p class="text-gray-600 font-mono text-sm mb-10">Follow your favorites and never miss a show</p>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            @forelse($artists as $artist)
                <a href="{{ route('artist.profile', $artist->id) }}" class="group">
                    <div>
                        <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-2 border-indigo-600 mb-4 group-hover:border-[#8ca34b] transition">
                            <img src="{{ $artist->profile_photo_url }}"
                                 alt="{{ $artist->stage_name }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-md font-semibold text-gray-800 group-hover:text-[#8ca34b] transition">{{ $artist->stage_name }}</h3>
                        <p class="text-sm text-gray-500 leading-tight">
                            {{ Str::limit($artist->bio, 80) }}<br>
                            {{ $artist->nationality }}
                        </p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">No artists found</p>
                </div>
            @endforelse
        </div>
    </div>
</section>



</x-layouts.public>
