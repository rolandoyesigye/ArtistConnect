<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        Role::findOrCreate('artist');

        $artists = [
            [
                'name' => 'Robert Kyagulanyi',
                'email' => 'bobi.wine@artistconnect.test',
                'stage_name' => 'Bobi Wine',
                'gender' => 'M',
                'nationality' => 'Ugandan',
                'address' => 'Magere, Wakiso',
                'NIN_number' => 'CM87654321A1B2',
                'bio' => 'Singer, songwriter, and political activist known for his afrobeat sound and socially conscious lyrics.',
            ],
            [
                'name' => 'Joseph Mayanja',
                'email' => 'chameleone@artistconnect.test',
                'stage_name' => 'Jose Chameleone',
                'gender' => 'M',
                'nationality' => 'Ugandan',
                'address' => 'Kampala',
                'NIN_number' => 'CM12345678C3D4',
                'bio' => 'One of East Africa\'s most successful musicians, blending Afro-pop, dancehall, and reggae.',
            ],
            [
                'name' => 'Sheebah Karungi',
                'email' => 'sheebah@artistconnect.test',
                'stage_name' => 'Sheebah',
                'gender' => 'F',
                'nationality' => 'Ugandan',
                'address' => 'Naguru, Kampala',
                'NIN_number' => 'CF22334455E5F6',
                'bio' => 'Pop and dancehall queen, known for her energetic performances and chart-topping hits.',
            ],
            [
                'name' => 'Hajara Namukwaya',
                'email' => 'spice.diana@artistconnect.test',
                'stage_name' => 'Spice Diana',
                'gender' => 'F',
                'nationality' => 'Ugandan',
                'address' => 'Mukono',
                'NIN_number' => 'CF33445566G7H8',
                'bio' => 'Award-winning artist whose afrobeats and dancehall fusions have made her a household name.',
            ],
            [
                'name' => 'Veronica Luggya',
                'email' => 'vinka@artistconnect.test',
                'stage_name' => 'Vinka',
                'gender' => 'F',
                'nationality' => 'Ugandan',
                'address' => 'Kampala',
                'NIN_number' => 'CF44556677I9J0',
                'bio' => 'Afrobeat and amapiano artist signed to Swangz Avenue, known for hits like "Chips na Ketchup".',
            ],
            [
                'name' => 'Moses Ssali',
                'email' => 'bebe.cool@artistconnect.test',
                'stage_name' => 'Bebe Cool',
                'gender' => 'M',
                'nationality' => 'Ugandan',
                'address' => 'Kampala',
                'NIN_number' => 'CM55667788K1L2',
                'bio' => 'Reggae, dancehall, and Afrobeat artist with a career spanning over two decades.',
            ],
        ];

        foreach ($artists as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ],
            );
            $user->assignRole('artist');

            $photo = 'https://placehold.co/400x400/8b5cf6/ffffff?text=' . urlencode($data['stage_name']);

            Artist::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'email' => $data['email'],
                    'stage_name' => $data['stage_name'],
                    'gender' => $data['gender'],
                    'nationality' => $data['nationality'],
                    'address' => $data['address'],
                    'NIN_number' => $data['NIN_number'],
                    'NIN_front_image' => 'https://placehold.co/600x400?text=NIN+Front',
                    'NIN_back_image' => 'https://placehold.co/600x400?text=NIN+Back',
                    'bio' => $data['bio'],
                    'profile_photo' => $photo,
                    'social_media_link' => json_encode([
                        ['platform' => 'Instagram', 'url' => 'https://instagram.com/' . strtolower(str_replace(' ', '', $data['stage_name']))],
                    ]),
                    'music_links' => json_encode([
                        ['platform' => 'Spotify', 'url' => 'https://open.spotify.com/artist/example'],
                    ]),
                ],
            );
        }
    }
}
