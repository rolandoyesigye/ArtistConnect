<div class="min-h-screen bg-[#ede2c0] py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#f8f3d4] overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-[#6b6b4e]">Create New Event</h2>
                    <a href="{{ route('organizer.dashboard') }}" class="text-[#8ca34b] hover:text-[#6b6b4e]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                </div>

                @if (session()->has('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                <form wire:submit="createEvent" class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-[#6b6b4e]">Event Title</label>
                        <input type="text" wire:model="title" id="title" class="mt-1 block w-full rounded-md border-[#e2d9b0] shadow-sm focus:border-[#b6c47a] focus:ring focus:ring-[#b6c47a] focus:ring-opacity-50">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-[#6b6b4e]">Description</label>
                        <textarea wire:model="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-[#e2d9b0] shadow-sm focus:border-[#b6c47a] focus:ring focus:ring-[#b6c47a] focus:ring-opacity-50"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-[#6b6b4e]">Event Image</label>
                        <input type="file" wire:model="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-[#6b6b4e] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#b6c47a] file:text-white hover:file:bg-[#8ca34b]">
                        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        @if ($image)
                            <div class="mt-2">
                                <img src="{{ $image->temporaryUrl() }}" class="h-32 w-32 object-cover rounded-lg">
                            </div>
                        @endif
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-[#6b6b4e]">Date and Time</label>
                        <input type="datetime-local" wire:model="date" id="date" class="mt-1 block w-full rounded-md border-[#e2d9b0] shadow-sm focus:border-[#b6c47a] focus:ring focus:ring-[#b6c47a] focus:ring-opacity-50">
                        @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="venue" class="block text-sm font-medium text-[#6b6b4e]">Venue</label>
                        <input type="text" wire:model="venue" id="venue" class="mt-1 block w-full rounded-md border-[#e2d9b0] shadow-sm focus:border-[#b6c47a] focus:ring focus:ring-[#b6c47a] focus:ring-opacity-50">
                        @error('venue') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="budget" class="block text-sm font-medium text-[#6b6b4e]">Budget</label>
                        <input type="number" wire:model="budget" id="budget" step="0.01" class="mt-1 block w-full rounded-md border-[#e2d9b0] shadow-sm focus:border-[#b6c47a] focus:ring focus:ring-[#b6c47a] focus:ring-opacity-50">
                        @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-[#b6c47a] text-white px-4 py-2 rounded-md hover:bg-[#8ca34b] focus:outline-none focus:ring-2 focus:ring-[#b6c47a] focus:ring-opacity-50">
                            Create Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

