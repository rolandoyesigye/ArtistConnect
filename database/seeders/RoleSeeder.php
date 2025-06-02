<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'artist']);
        Role::create(['name' => 'organizer']);
        Role::create(['name' => 'user']);
    }
} 