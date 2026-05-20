<footer class="bg-[#0c0f1a] text-gray-400 font-mono text-sm">
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <h3 class="text-white font-bold text-base mb-3">ArtistConnect</h3>
            <p>
                Connecting music lovers with live performances in Uganda and beyond.
                Find concerts, track artists, and discover live shows.
            </p>
        </div>

        <div>
            <h4 class="text-white font-bold mb-3">Get started</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                <li><a href="{{ route('artist.register') }}" class="hover:text-white">Join as artist</a></li>
                <li><a href="{{ route('organizer.register') }}" class="hover:text-white">Join as organizer</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold mb-3">Contact</h4>
            <p>Kampala, Uganda</p>
            <p class="mt-2">info@artistconnect.test</p>
        </div>
    </div>

    <div class="border-t border-gray-700 py-6 px-4 max-w-7xl mx-auto">
        <p class="text-center">&copy; {{ date('Y') }} ArtistConnect. All rights reserved.</p>
    </div>
</footer>
