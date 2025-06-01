<?php

use App\Models\User;
use App\Models\Artist;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('components.layouts.auth')] class extends Component {
    use WithFileUploads;
    
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $stage_name = '';
    public string $gender = '';
    public string $nationality = '';
    public string $address = '';
    public string $NIN_number = '';
    public $NIN_front_image;
    public $NIN_back_image;
    public string $bio = '';
    public $profile_photo;
    public array $social_media_links = [];
    public array $music_links = [];
    public bool $terms = false;
    public int $step = 1;

    public function mount()
    {
        $this->social_media_links = [['platform' => '', 'url' => '']];
        $this->music_links = [['platform' => '', 'url' => '']];
    }

    public function addSocialMediaLink()
    {
        $this->social_media_links[] = ['platform' => '', 'url' => ''];
    }

    public function removeSocialMediaLink($index)
    {
        unset($this->social_media_links[$index]);
        $this->social_media_links = array_values($this->social_media_links);
    }

    public function addMusicLink()
    {
        $this->music_links[] = ['platform' => '', 'url' => ''];
    }

    public function removeMusicLink($index)
    {
        unset($this->music_links[$index]);
        $this->music_links = array_values($this->music_links);
    }

    public function validateStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required'],
                'stage_name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'nationality' => ['required', 'string'],
                'address' => ['required', 'string'],
                'NIN_number' => ['required', 'string', 'unique:artists'],
                'NIN_front_image' => ['required', 'image', 'max:1024'],
                'NIN_back_image' => ['required', 'image', 'max:1024'],
            ]);
        } elseif ($this->step === 2) {
            $this->validate([
                'bio' => ['required', 'string'],
                'profile_photo' => ['required', 'image', 'max:1024'],
            ]);
        } elseif ($this->step === 3) {
            $this->validate([
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'terms' => ['required', 'accepted'],
            ]);
        }
    }

    public function next()
    {
        try {
            $this->validateStep();
            $this->step++;
        } catch (\Exception $e) {
            session()->flash('error', 'Please fill in all required fields correctly.');
        }
    }

    public function back()
    {
        $this->step--;
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        try {
            // Validate all steps
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required'],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'stage_name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'nationality' => ['required', 'string'],
                'address' => ['required', 'string'],
                'NIN_number' => ['required', 'string', 'unique:artists'],
                'NIN_front_image' => ['required', 'image', 'max:1024'],
                'NIN_back_image' => ['required', 'image', 'max:1024'],
                'bio' => ['required', 'string'],
                'profile_photo' => ['required', 'image', 'max:1024'],
                'terms' => ['required', 'accepted'],
            ]);

            // Create user
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Handle file uploads
            $ninFrontPath = $this->NIN_front_image->store('nin-images', 'public');
            $ninBackPath = $this->NIN_back_image->store('nin-images', 'public');
            $profilePhotoPath = $this->profile_photo->store('profile-photos', 'public');

            // Create artist record
            Artist::create([
                'user_id' => $user->id,
                'stage_name' => $this->stage_name,
                'gender' => $this->gender,
                'nationality' => $this->nationality,
                'address' => $this->address,
                'NIN_number' => $this->NIN_number,
                'NIN_front_image' => $ninFrontPath,
                'NIN_back_image' => $ninBackPath,
                'bio' => $this->bio,
                'profile_photo' => $profilePhotoPath,
                'social_media_link' => json_encode($this->social_media_links),
                'music_links' => json_encode($this->music_links),
            ]);

            event(new Registered($user));
            Auth::login($user);

            // Redirect to artist dashboard
            $this->redirect(route('artist.dashboard'), navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Registration failed: ' . $e->getMessage());
        }
    }
}; ?>

<div class="min-h-screen max-w-screen-xl mx-auto px-4 flex items-center justify-center bg-[#ede2c0] font-mono">
    <div class="w-full max-w-[90%] bg-[#f8f3d4] rounded-2xl shadow-lg p-10 flex flex-col gap-8">
        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Stepper -->
        <div class="flex items-center justify-center gap-8 mb-8">
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold {{ $step >= 1 ? 'bg-[#b6c47a] text-white' : 'bg-[#e2d9b0] text-[#8ca34b]' }}">✔</div>
                <span class="mt-2 font-semibold {{ $step === 1 ? 'text-[#8ca34b]' : 'text-[#6b6b4e]' }}">Personal Information</span>
            </div>
            <div class="w-12 h-1 bg-[#b6c47a]"></div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold {{ $step >= 2 ? 'bg-[#b6c47a] text-white' : 'bg-[#e2d9b0] text-[#8ca34b]' }}">🎵</div>
                <span class="mt-2 font-semibold {{ $step === 2 ? 'text-[#8ca34b]' : 'text-[#6b6b4e]' }}">Artist Details</span>
            </div>
            <div class="w-12 h-1 bg-[#b6c47a]"></div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-lg font-bold {{ $step === 3 ? 'bg-[#b6c47a] text-white' : 'bg-[#e2d9b0] text-[#8ca34b]' }}">🔑</div>
                <span class="mt-2 font-semibold {{ $step === 3 ? 'text-[#8ca34b]' : 'text-[#6b6b4e]' }}">Account Setup</span>
            </div>
        </div>

        <form wire:submit.prevent="register" class="space-y-6">
            @if ($step === 1)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label for="name" class="block text-[#6b6b4e] font-semibold mb-1">Name</label>
                    <input wire:model="name" type="text" id="name" placeholder="Name"
                        class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="email">Email</label>
                    <input wire:model="email" type="email" placeholder="Email" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="stage_name">Stage Name</label>
                    <input wire:model="stage_name" type="text" placeholder="Stage Name" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />        
                    <label for="gender">Gender</label>
                    <input wire:model="gender" type="text" placeholder="Gender" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="nationality">Nationality</label>
                    <input wire:model="nationality" type="text" placeholder="Nationality" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="address">Address</label>
                    <input wire:model="address" type="text" placeholder="Address" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80 md:col-span-2" />
                    <label for="NIN_number">NIN Number</label>
                    <input wire:model="NIN_number" type="text" placeholder="NIN Number" class="rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="NIN_front_image">NIN Front Image</label>
                    <input wire:model="NIN_front_image" type="file" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="NIN_back_image">NIN Back Image</label>
                    <input wire:model="NIN_back_image" type="file" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                </div>
            @elseif ($step === 2)
                <div class="space-y-4">
                    <label for="bio">Bio</label>
                    <textarea wire:model="bio" placeholder="Bio (Organisation journey)" rows="3" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80"></textarea>
                    <label for="profile_photo">Profile Photo</label>
                    <input wire:model="profile_photo" type="file" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    
                    <label for="social_media_link">Social Media Links</label>
                    <button type="button" wire:click="addSocialMediaLink" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 font-semibold transition">Add Link</button>
                    @foreach($social_media_links as $index => $link)
                    <div class="flex items-center gap-2 mb-2">
                            <select wire:model="social_media_links.{{ $index }}.platform" class="border border-[#e2d9b0] rounded px-2 py-1 bg-[#f8f3d4] text-[#6b6b4e]">
                                <option value="">Select</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Twitter">Twitter</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Youtube">Youtube</option>
                                <option value="Tiktok">Tiktok</option>
                                <option value="Website">Website</option>
                                <option value="Other">Other</option>
                        </select>
                            <input type="text" wire:model="social_media_links.{{ $index }}.url" class="flex-1 border border-[#e2d9b0] rounded px-2 py-1 bg-[#f8f3d4] text-[#6b6b4e]" placeholder="Link" />
                            <button type="button" wire:click="removeSocialMediaLink({{ $index }})" class="bg-[#e2d9b0] text-[#b85c5c] rounded px-3 py-1">✕</button>
                    </div>
                    @endforeach
                    
                    <label for="music_links">Music Links</label>
                    <button type="button" wire:click="addMusicLink" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 font-semibold transition">Add Link</button>
                    @foreach($music_links as $index => $link)
                    <div class="flex items-center gap-2 mb-2">
                            <select wire:model="music_links.{{ $index }}.platform" class="border border-[#e2d9b0] rounded px-2 py-1 bg-[#f8f3d4] text-[#6b6b4e]">
                                <option value="">Select</option>
                                <option value="Soundcloud">Soundcloud</option>
                                <option value="Spotify">Spotify</option>
                                <option value="Apple Music">Apple Music</option>
                                <option value="Youtube Music">Youtube Music</option>
                                <option value="Other">Other</option>
                        </select>
                            <input type="text" wire:model="music_links.{{ $index }}.url" class="flex-1 border border-[#e2d9b0] rounded px-2 py-1 bg-[#f8f3d4] text-[#6b6b4e]" placeholder="Link" />
                            <button type="button" wire:click="removeMusicLink({{ $index }})" class="bg-[#e2d9b0] text-[#b85c5c] rounded px-3 py-1">✕</button>
                    </div>
                    @endforeach
                </div>
            @elseif ($step === 3)
                <div class="space-y-4">
                    <label for="password">Password</label>
                    <input wire:model="password" type="password" placeholder="Password" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <label for="password_confirmation">Confirm Password</label>
                    <input wire:model="password_confirmation" type="password" placeholder="Confirm Password" class="rounded-lg border border-gray-300 px-4 py-2 w-full focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-white/80" />
                    <div class="flex items-center gap-2">
                        <input type="checkbox" wire:model="terms" id="terms" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-400" />
                        <label for="terms" class="text-gray-700 text-sm">Accept the terms and conditions</label>
                    </div>
                </div>
            @endif

            <div class="flex justify-between mt-8">
                @if ($step > 1)
                    <button type="button" wire:click="back"
                        class="bg-[#ede2c0] text-[#8ca34b] px-6 py-2 rounded font-semibold border border-[#b6c47a] hover:bg-[#e2d9b0] transition">
                        Back
                    </button>
                @endif
                @if ($step < 3)
                    <button type="button" wire:click="next"
                        class="bg-[#b6c47a] text-white px-6 py-2 rounded font-semibold hover:bg-[#8ca34b] transition ml-auto">
                        Next
                    </button>
                @else
                    <button type="submit"
                        class="bg-[#b6c47a] text-white px-6 py-2 rounded font-semibold hover:bg-[#8ca34b] transition ml-auto">
                        Register
                    </button>
                @endif
            </div>
        </form>
    </div>
</div>



