@props([
    'title' => null,
    'description' => 'Discover live music, track your favorite artists, and never miss a show.',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description }}">
    <title>{{ $title ? $title.' — '.config('app.name', 'ArtistConnect') : config('app.name', 'ArtistConnect') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#0a092a]">
    <x-public.nav />

    {{ $slot }}

    <x-public.footer />

    @livewireScripts
</body>
</html>
