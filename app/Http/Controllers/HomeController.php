<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Artist;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('date', '>=', now())
            ->where('status', 'published')
            ->orderBy('date')
            ->take(4)
            ->get();

        $artists = Artist::with('user')
            ->latest()
            ->take(4)
            ->get();

        return view('home.index', compact('events', 'artists'));
    }
}
