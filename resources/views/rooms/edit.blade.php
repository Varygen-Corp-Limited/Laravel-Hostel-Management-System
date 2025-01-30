<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Room') }} {{ $room->room_number }}
            </h2>
            <a href="{{ route('rooms.show', $room) }}"
                class="inline-flex items-center px-4 py-2 bg-luxury-600 dark:bg-luxury-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-luxury-700 dark:hover:bg-luxury-600 transition ease-in-out duration-150">
                Back to Room
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('rooms.update', $room) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="room_number" value="Room Number" />
                            <x-text-input id="room_number" name="room_number" type="text" class="mt-1 block w-full"
                                :value="old('room_number', $room->room_number)" required />
                            <x-input-error :messages="$errors->get('room_number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="capacity" value="Capacity (persons)" />
                            <x-text-input id="capacity" name="capacity" type="number" class="mt-1 block w-full"
                                :value="old('capacity', $room->capacity)" required min="1" />
                            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="price_per_night" value="Price per Night ($)" />
                            <x-text-input id="price_per_night" name="price_per_night" type="number" step="0.01"
                                class="mt-1 block w-full" :value="old('price_per_night', $room->price_per_night)" required min="0" />
                            <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status" value="Status" />
                            <select id="status" name="status"
                                class="mt-1 block w-full border-luxury-200 dark:border-luxury-700 bg-white/50 dark:bg-gray-900/50 text-luxury-900 dark:text-luxury-100 focus:border-luxury-500 dark:focus:border-luxury-600 focus:ring-luxury-500 dark:focus:ring-luxury-600 rounded-lg shadow-sm">
                                <option value="available"
                                    {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>
                                    Available</option>
                                <option value="occupied"
                                    {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>
                                    Occupied</option>
                                <option value="maintenance"
                                    {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>Maintenance
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex justify-end space-x-4">
                            <form action="{{ route('rooms.destroy', $room) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this room?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition ease-in-out duration-150">
                                    Delete Room
                                </button>
                            </form>
                            <x-primary-button>
                                {{ __('Update Room') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
