<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomeController;
use App\Livewire\Artist\Auth\Register;
use App\Http\Controllers\ArtistController;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Artist routes
Volt::route('artist/register', 'artist.auth.register')->name('artist.register');
Route::middleware(['auth'])->group(function () {
    Route::get('/artist/dashboard', function () {
        return view('artist.dashboard');
    })->name('artist.dashboard');
});

Route::get('/artist/{id}', [ArtistController::class, 'profile'])->name('artist.profile');

// Organizer routes
Volt::route('organizer/register', 'organizer.auth.register')->name('organizer.register');
Route::middleware(['auth'])->group(function () {
    Route::get('/organizer/dashboard', function () {
        return view('organizer.dashboard');
    })->name('organizer.dashboard');
});

require __DIR__.'/auth.php';
