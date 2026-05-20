<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::findOrCreate('artist');
        Role::findOrCreate('organizer');
        Role::findOrCreate('user');
    }
} 