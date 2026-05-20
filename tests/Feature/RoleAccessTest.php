<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    Role::findOrCreate('user');
    Role::findOrCreate('artist');
    Role::findOrCreate('organizer');
});

test('guest is redirected from artist dashboard to login', function () {
    $this->get('/artist/dashboard')->assertRedirect('/login');
});

test('guest is redirected from organizer dashboard to login', function () {
    $this->get('/organizer/dashboard')->assertRedirect('/login');
});

test('guest is redirected from organizer event creation to login', function () {
    $this->get('/organizer/events/create')->assertRedirect('/login');
});

test('artist can access artist dashboard', function () {
    $artist = User::factory()->create();
    $artist->assignRole('artist');

    $this->actingAs($artist)
        ->get('/artist/dashboard')
        ->assertStatus(200);
});

test('artist cannot access organizer dashboard', function () {
    $artist = User::factory()->create();
    $artist->assignRole('artist');

    $this->actingAs($artist)
        ->get('/organizer/dashboard')
        ->assertForbidden();
});

test('artist cannot access organizer event creation', function () {
    $artist = User::factory()->create();
    $artist->assignRole('artist');

    $this->actingAs($artist)
        ->get('/organizer/events/create')
        ->assertForbidden();
});

test('organizer can access organizer dashboard', function () {
    $organizer = User::factory()->create();
    $organizer->assignRole('organizer');

    $this->actingAs($organizer)
        ->get('/organizer/dashboard')
        ->assertStatus(200);
});

test('organizer can access event creation', function () {
    $organizer = User::factory()->create();
    $organizer->assignRole('organizer');

    $this->actingAs($organizer)
        ->get('/organizer/events/create')
        ->assertStatus(200);
});

test('organizer cannot access artist dashboard', function () {
    $organizer = User::factory()->create();
    $organizer->assignRole('organizer');

    $this->actingAs($organizer)
        ->get('/artist/dashboard')
        ->assertForbidden();
});

test('fan with only user role cannot access artist dashboard', function () {
    $fan = User::factory()->create();
    $fan->assignRole('user');

    $this->actingAs($fan)
        ->get('/artist/dashboard')
        ->assertForbidden();
});

test('fan with only user role cannot access organizer dashboard', function () {
    $fan = User::factory()->create();
    $fan->assignRole('user');

    $this->actingAs($fan)
        ->get('/organizer/dashboard')
        ->assertForbidden();
});

test('fan with only user role cannot create events', function () {
    $fan = User::factory()->create();
    $fan->assignRole('user');

    $this->actingAs($fan)
        ->get('/organizer/events/create')
        ->assertForbidden();
});

test('user with both artist and organizer roles can access both dashboards', function () {
    $user = User::factory()->create();
    $user->assignRole(['artist', 'organizer']);

    $this->actingAs($user)->get('/artist/dashboard')->assertStatus(200);
    $this->actingAs($user)->get('/organizer/dashboard')->assertStatus(200);
});
