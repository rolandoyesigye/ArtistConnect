<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::where('date', '>=', now())
            ->where('status', '!=', 'cancelled')
            ->orderBy('date')
            ->take(4)
            ->get();

        Log::info('Events for home page:', [
            'count' => $events->count(),
            'events' => $events->toArray()
        ]);

        $artists = Artist::with('user')
            ->latest()
            ->take(4)
            ->get();

        return view('home.index', compact('events', 'artists'));
    }
}
