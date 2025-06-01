<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        
        if (!$user->artist) {
            return redirect()->route('artist.register');
        }

        // Get likes count
        $likes = $user->artist->likes()->count();

        // Get followers count
        $followers = $user->artist->followers()->count();

        // Get monthly bookings count
        $bookings = $user->artist->bookings()
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->count();

        // Get user email
        $email = $user->email;

        return view('artist.dashboard', compact('likes', 'followers', 'bookings', 'email'));
    }

    public function profile($id)
    {
        $artist = Artist::with(['music', 'upcomingEvents'])
            ->withCount(['likes', 'followers', 'bookings'])
            ->findOrFail($id);

        return view('artist.profile', compact('artist'));
    }
} 