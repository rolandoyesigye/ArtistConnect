<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $artists = \App\Models\Artist::with('user')
            ->latest()
            ->take(4)
            ->get();

        return view('home.index', compact('artists'));
    }
}
