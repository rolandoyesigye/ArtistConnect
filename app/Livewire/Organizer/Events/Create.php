<?php

namespace App\Livewire\Organizer\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $description = '';
    public $date = '';
    public $venue = '';
    public $budget = '';
    public $image;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'description' => 'required|min:10',
        'date' => 'required|date|after:now',
        'venue' => 'required|min:3|max:255',
        'budget' => 'required|numeric|min:0',
        'image' => 'required|image|max:1024', // max 1MB
    ];

    public function createEvent()
    {
        $this->validate();

        try {
            // Store the image
            $imagePath = $this->image->store('event-images', 'public');

            Event::create([
                'organizer_id' => auth()->id(),
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date,
                'venue' => $this->venue,
                'budget' => $this->budget,
                'image' => $imagePath,
                'status' => 'draft',
            ]);

            session()->flash('success', 'Event created successfully!');
            return redirect()->route('organizer.dashboard');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create event. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.organizer.events.create')
            ->layout('components.layouts.guest');
    }
}
