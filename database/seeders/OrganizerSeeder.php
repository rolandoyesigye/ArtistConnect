<?php

namespace Database\Seeders;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class OrganizerSeeder extends Seeder
{
    public function run(): void
    {
        Role::findOrCreate('organizer');

        $organizers = [
            [
                'name' => 'Talent Africa',
                'email' => 'talent.africa@artistconnect.test',
                'organization_name' => 'Talent Africa Group',
                'organization_type' => 'Event Company',
                'phone_number' => '+256 700 111 222',
                'address' => 'Plot 7, Lugogo, Kampala',
                'business_registration' => 'BR-TA-2010-0001',
                'bio' => 'East Africa\'s premier live entertainment company, behind some of the region\'s biggest concerts.',
            ],
            [
                'name' => 'Swangz Avenue',
                'email' => 'swangz@artistconnect.test',
                'organization_name' => 'Swangz Avenue',
                'organization_type' => 'Promoter',
                'phone_number' => '+256 700 333 444',
                'address' => 'Bugolobi, Kampala',
                'business_registration' => 'BR-SA-2008-0002',
                'bio' => 'Record label and event promoter behind some of Uganda\'s biggest artists and shows.',
            ],
            [
                'name' => 'MTN Pulse',
                'email' => 'mtn.pulse@artistconnect.test',
                'organization_name' => 'MTN Pulse Events',
                'organization_type' => 'Festival Organizer',
                'phone_number' => '+256 700 555 666',
                'address' => 'Nyonyi Gardens, Kampala',
                'business_registration' => 'BR-MP-2015-0003',
                'bio' => 'Youth-focused brand running festivals, concerts, and campus tours across Uganda.',
            ],
        ];

        foreach ($organizers as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ],
            );
            $user->assignRole('organizer');

            $photo = 'https://placehold.co/400x400/0ea5e9/ffffff?text=' . urlencode($data['organization_name']);

            Organizer::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'organization_name' => $data['organization_name'],
                    'organization_type' => $data['organization_type'],
                    'phone_number' => $data['phone_number'],
                    'address' => $data['address'],
                    'business_registration' => $data['business_registration'],
                    'business_registration_doc' => 'https://placehold.co/600x400?text=Business+Doc',
                    'bio' => $data['bio'],
                    'profile_photo' => $photo,
                    'social_media_links' => [
                        ['platform' => 'Website', 'url' => 'https://example.com'],
                    ],
                ],
            );
        }
    }
}
