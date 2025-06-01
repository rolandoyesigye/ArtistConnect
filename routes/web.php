<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomeController;
use App\Livewire\Artist\Auth\Register;


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

Volt::route('artist/register', 'artist.auth.register')->name('artist.register');

// Artist routes
Route::middleware(['auth'])->group(function () {
    Route::get('/artist/dashboard', function () {
        return view('artist.dashboard');
    })->name('artist.dashboard');
});

require __DIR__.'/auth.php';
