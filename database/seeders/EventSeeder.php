<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $organizers = User::role('organizer')->get();

        if ($organizers->isEmpty()) {
            $this->command->warn('No organizers found — run OrganizerSeeder first.');
            return;
        }

        $events = [
            [
                'title' => 'Nyege Nyege Festival 2026',
                'description' => 'Four days and nights of music, art, and culture on the banks of the Nile in Jinja. Featuring local and international artists across multiple stages.',
                'venue' => 'Itanda Falls, Jinja',
                'budget' => 250000,
                'days_from_now' => 14,
            ],
            [
                'title' => 'Roast & Rhyme — Independence Edition',
                'description' => 'Uganda\'s premier monthly meat-and-music brunch returns for a special Independence Day edition with live performances.',
                'venue' => 'Jahazi Pier, Munyonyo',
                'budget' => 80000,
                'days_from_now' => 21,
            ],
            [
                'title' => 'Blankets & Wine Kampala',
                'description' => 'A picnic-style afternoon of live music, wine, and good company under the Kampala sky.',
                'venue' => 'Lugogo Cricket Oval, Kampala',
                'budget' => 120000,
                'days_from_now' => 35,
            ],
            [
                'title' => 'Bayimba International Festival',
                'description' => 'A three-day celebration of music, dance, theatre, and visual arts, showcasing the best of Ugandan and African creativity.',
                'venue' => 'Lunkulu Island, Lake Victoria',
                'budget' => 180000,
                'days_from_now' => 50,
            ],
            [
                'title' => 'Swangz All-Star Concert',
                'description' => 'A night of non-stop hits as the entire Swangz Avenue roster takes the stage for one unforgettable show.',
                'venue' => 'Kampala Serena Hotel',
                'budget' => 150000,
                'days_from_now' => 7,
            ],
            [
                'title' => 'Campus Bash — Makerere',
                'description' => 'The biggest university party of the semester, bringing top DJs and a surprise headline artist to the heart of Makerere.',
                'venue' => 'Freedom Square, Makerere University',
                'budget' => 50000,
                'days_from_now' => 28,
            ],
        ];

        foreach ($events as $i => $data) {
            $organizer = $organizers[$i % $organizers->count()];

            Event::updateOrCreate(
                ['title' => $data['title']],
                [
                    'organizer_id' => $organizer->id,
                    'description' => $data['description'],
                    'image' => 'https://placehold.co/800x400/1d0c2a/ffffff?text=' . urlencode($data['title']),
                    'date' => now()->addDays($data['days_from_now'])->setTime(19, 0),
                    'venue' => $data['venue'],
                    'budget' => $data['budget'],
                    'status' => 'published',
                ],
            );
        }
    }
}
