@include('home.nav')

<div class="bg-gradient-to-br from-[#100c2a] via-[#1d0c2a] to-[#0a092a] text-white min-h-screen flex items-center justify-center px-4">
<section class="text-center max-w-4xl w-full space-y-8">
    
    <!-- Heading -->
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

    <!-- Search Bar -->
    <div class="flex justify-center gap-4 flex-wrap">
      <input 
        type="text" 
        placeholder="Artist, venue, or city" 
        class="px-5 py-3 rounded-full w-full max-w-md text-black placeholder-gray-500 focus:outline-none"
      />
      <button class="px-6 py-3 rounded-full bg-indigo-600 hover:bg-indigo-700 transition text-white font-semibold shadow-md">
        Find Events
      </button>
    </div>

    <!-- Tags -->
    <div class="flex justify-center flex-wrap gap-2 mt-4">
      <span class="bg-[#2a263b] text-sm px-4 py-2 rounded-full">Live Tonight</span>
      <span class="bg-[#2a263b] text-sm px-4 py-2 rounded-full">This Weekend</span>
      <span class="bg-[#2a263b] text-sm px-4 py-2 rounded-full">Electronic</span>
      <span class="bg-[#2a263b] text-sm px-4 py-2 rounded-full">Rock</span>
      <span class="bg-[#2a263b] text-sm px-4 py-2 rounded-full">Hip-Hop</span>
    </div>

    <!-- Stats -->
    <div class="flex justify-center gap-8 text-center mt-6 text-xl font-semibold">
      <div><span class="text-white">500K+</span><br /><span class="text-gray-400 text-sm">Artists</span></div>
      <div><span class="text-white">5M+</span><br /><span class="text-gray-400 text-sm">Users</span></div>
      <div><span class="text-white">100K+</span><br /><span class="text-gray-400 text-sm">Events</span></div>
    </div>
    
  </section>
</div>

<section class="bg-gradient-to-b from-[#0a092a] to-[#141229] py-16 px-4 text-white">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-2xl md:text-3xl font-semibold mb-10">Join Our Community</h2>

    <div class="grid gap-6 md:grid-cols-3">
      <!-- Artist Card -->
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

      <!-- Organizer Card -->
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

      <!-- Venue Card -->
      <div class="bg-[#1b1a2e] rounded-xl border border-gray-600 p-6 flex flex-col items-center space-y-4">
        <div class="bg-[#2f2e4a] p-3 rounded-full">
          <svg class="w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4 22h16V2H4v20zm2-2v-2h2v2H6zm0-4v-2h2v2H6zm0-4V8h2v4H6zm4 8v-2h2v2h-2zm0-4v-2h2v2h-2zm0-4V8h2v4h-2zm4 8v-2h2v2h-2zm0-4v-2h2v2h-2zm0-4V8h2v4h-2z"/>
          </svg>
        </div>
        <h3 class="text-lg font-semibold">Venue</h3>
        <p class="text-sm text-gray-400">List & promote your venue</p>
        <button class="bg-indigo-600 hover:bg-indigo-700 transition px-6 py-2 rounded-full text-white font-medium">
          Join as Venue
        </button>
      </div>
    </div>
  </div>
</section>


<section class="bg-[#f9fafb] py-16 px-4 text-center text-gray-800">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">What Our Users Say</h2>
    <p class="text-sm md:text-base text-gray-600 mb-10">
      Join thousands of music lovers who've discovered their next favorite show
    </p>

    <div class="grid gap-6 md:grid-cols-3">
      <!-- Testimonial 1 -->
      <div class="bg-white p-6 rounded-xl shadow-md text-left">
        <p class="text-sm md:text-base mb-4">
          "SoundStage has completely changed how I discover concerts. I used to miss my favorite artists when they were in town, but now I get notified immediately!"
        </p>
        <div class="flex items-center mt-4">
          <img src="https://placehold.co/40x40" alt="User avatar" class="w-8 h-8 rounded-full mr-3">
          <div class="text-sm font-medium text-gray-600">Music Enthusiast</div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white p-6 rounded-xl shadow-md text-left">
        <p class="text-sm md:text-base mb-4">
          "The mobile app is incredibly user-friendly. I can track all my favorite artists and buy tickets with just a few taps. Couldn't be easier!"
        </p>
        <div class="flex items-center mt-4">
          <img src="https://placehold.co/40x40" alt="User avatar" class="w-8 h-8 rounded-full mr-3">
          <div class="text-sm font-medium text-gray-600">Concert Goer</div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white p-6 rounded-xl shadow-md text-left">
        <p class="text-sm md:text-base mb-4">
          "As a touring musician, SoundStage has been amazing for connecting with fans. The platform makes it so easy to promote our shows and reach new audiences."
        </p>
        <div class="flex items-center mt-4">
          <img src="https://placehold.co/40x40" alt="User avatar" class="w-8 h-8 rounded-full mr-3">
          <div class="text-sm font-medium text-gray-600">Independent Artist</div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-12 px-6 bg-white text-gray-800">
  <div class="max-w-6xl mx-auto">
    <!-- Heading -->
    <h2 class="text-2xl font-semibold mb-2">Featured Concerts</h2>
    <p class="text-sm text-gray-600 mb-6">Upcoming events you won't want to miss</p>

    <!-- Genre Filters -->
    <div class="flex flex-wrap gap-3 mb-8">
      <button class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold">All Genres</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Pop</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Rock</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Hip-Hop</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Electronic</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">R&B</button>
      <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Latin</button>
    </div>

    <!-- Concert Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($events as $event)
            <div class="rounded-xl border shadow-sm overflow-hidden bg-white">
                <div class="relative h-40 bg-gradient-to-b from-transparent to-black">
                    <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 text-white font-mono text-sm">{{ $event->date->format('F j, Y g:i A') }}</div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-medium text-gray-700">{{ $event->title }}</h3>
                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                            @if($event->status === 'draft') bg-yellow-100 text-yellow-800
                            @elseif($event->status === 'published') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">{{ $event->venue }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-indigo-600 font-mono">UGX {{ number_format($event->budget, 0) }}</span>
                        <a href="#" class="bg-indigo-600 text-white px-4 py-1 rounded-full text-sm hover:bg-indigo-700 transition">Get Tickets</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No upcoming events available at the moment.</p>
            </div>
        @endforelse
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-10">
      <button class="px-6 py-2 rounded-full bg-indigo-100 text-indigo-600 font-mono text-sm">Load more concerts</button>
    </div>
  </div>
</section>


<section class="bg-gray-50 py-16 px-6">
  <div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-10">
      <p class="text-gray-600 font-mono text-sm">Follow your favorites and never miss a show</p>
      <a href="#" class="text-indigo-600 font-mono text-sm hover:underline">Explore all artists</a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
      @forelse($artists as $artist)
        <!-- Artist Card -->
        <a href="{{ route('artist.profile', $artist->id) }}" class="group">
          <div>
            <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-2 border-indigo-600 mb-4 group-hover:border-[#8ca34b] transition">
              <img src="{{ Storage::url($artist->profile_photo) }}" 
                   alt="{{ $artist->stage_name }}" 
                   class="w-full h-full object-cover">
            </div>
            <h3 class="text-md font-semibold text-gray-800 group-hover:text-[#8ca34b] transition">{{ $artist->stage_name }}</h3>
            <p class="text-sm text-gray-500 leading-tight">
              {{ Str::limit($artist->bio, 30) }}<br>
              {{ $artist->nationality }}
            </p>
          </div>
        </a>
      @empty
        <div class="col-span-4 text-center py-8">
          <p class="text-gray-500">No artists found</p>
        </div>
      @endforelse
    </div>
  </div>
</section>


<section class="bg-gray-50 py-16 px-6">
  <div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-10">
      <p class="text-gray-600 font-mono text-sm">Discover the best music venues around you</p>
      <a href="#" class="text-indigo-600 font-mono text-sm hover:underline">View all venues</a>
    </div>

    <!-- Venue Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Venue Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="https://via.placeholder.com/400x200" alt="Venue" class="w-full h-48 object-cover">
        <div class="p-4 font-mono text-sm text-gray-700">
          <h3 class="text-gray-400 font-bold">Madison Square Garden</h3>
          <p class="text-gray-800 font-semibold">New York, NY</p>
          <p class="mt-2 text-gray-600">One of the most famous arenas in the world, hosting major concerts and events.</p>
          <div class="mt-4 text-xs text-gray-500 flex justify-between">
            <span>15 Upcoming Events</span>
            <span>All Genres</span>
          </div>
        </div>
      </div>

      <!-- Venue Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="https://via.placeholder.com/400x200" alt="Venue" class="w-full h-48 object-cover">
        <div class="p-4 font-mono text-sm text-gray-700">
          <h3 class="text-gray-400 font-bold">The Forum</h3>
          <p class="text-gray-800 font-semibold">Los Angeles, CA</p>
          <p class="mt-2 text-gray-600">A historic venue known for its unique architecture and amazing acoustics.</p>
          <div class="mt-4 text-xs text-gray-500 flex justify-between">
            <span>12 Upcoming Events</span>
            <span>All Genres</span>
          </div>
        </div>
      </div>

      <!-- Venue Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="https://via.placeholder.com/400x200" alt="Venue" class="w-full h-48 object-cover">
        <div class="p-4 font-mono text-sm text-gray-700">
          <h3 class="text-gray-400 font-bold">Red Rocks Amphitheatre</h3>
          <p class="text-gray-800 font-semibold">Morrison, CO</p>
          <p class="mt-2 text-gray-600">A natural rock structure that creates an unparalleled concert experience.</p>
          <div class="mt-4 text-xs text-gray-500 flex justify-between">
            <span>20 Upcoming Events</span>
            <span>Rock, Indie</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="bg-[#f4f6fd] py-20 px-6 font-mono">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
    
    <!-- Text Content -->
    <div class="max-w-xl">
      <h2 class="text-xl text-gray-400 font-bold mb-4">Take ArtistConnect With You</h2>
      <p class="text-gray-700 mb-6">
        Download our app and never miss another show. Get notified when your favorite artists announce new concerts near you.
      </p>
      
      <!-- Features List -->
      <ul class="space-y-4 mb-8">
        <li class="flex items-start gap-2 text-sm text-gray-700">
          <span class="text-blue-300 mt-1">●</span>
          <div>
            <p class="text-gray-500 font-bold">Artist Alerts</p>
            <p>Get notified when your favorite artists announce tour dates.</p>
          </div>
        </li>
        <li class="flex items-start gap-2 text-sm text-gray-700">
          <span class="text-blue-300 mt-1">●</span>
          <div>
            <p class="text-gray-500 font-bold">Easy Ticketing</p>
            <p>Buy tickets directly in the app with just a few taps.</p>
          </div>
        </li>
        <li class="flex items-start gap-2 text-sm text-gray-700">
          <span class="text-blue-300 mt-1">●</span>
          <div>
            <p class="text-gray-500 font-bold">Local Discoveries</p>
            <p>Find concerts near you based on your location and preferences.</p>
          </div>
        </li>
      </ul>

      <!-- App Buttons -->
      <div class="flex gap-4">
        <a href="#" class="bg-black text-white text-xs px-4 py-3 rounded-md text-left">
          <p class="text-gray-300">Download on the</p>
          <p class="font-bold">App Store</p>
        </a>
        <a href="#" class="bg-black text-white text-xs px-4 py-3 rounded-md text-left">
          <p class="text-gray-300">Get it on</p>
          <p class="font-bold">Google Play</p>
        </a>
      </div>
    </div>

    <!-- App Screenshot -->
    <div class="flex-shrink-0">
      <img 
        src="https://via.placeholder.com/220x420" 
        alt="Mobile App Screenshot" 
        class="rounded-full p-1 border-4 border-white shadow-[0_0_40px_10px_rgba(168,85,247,0.4)]"
      />
    </div>
  </div>
</section>




@include('home.footer')