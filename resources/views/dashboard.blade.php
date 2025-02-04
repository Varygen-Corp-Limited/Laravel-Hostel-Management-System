<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-bold text-luxury-800 dark:text-gold-300">
            {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Stats Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Active Bookings -->
                <div
                    class="bg-white/90 dark:bg-gray-800/50 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-luxury-600 dark:text-gold-400">Active Bookings</p>
                            <p class="text-2xl font-bold text-luxury-900 dark:text-gold-300">
                                {{ $stats['activeBookings'] }}</p>
                            <p class="text-sm text-luxury-500 dark:text-gold-500/70">{{ $stats['checkoutsToday'] }}
                                checkouts today</p>
                        </div>
                        <div class="p-3 bg-luxury-100 dark:bg-gold-900/20 rounded-full">
                            <svg class="w-6 h-6 text-luxury-700 dark:text-gold-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Available Rooms -->
                <div
                    class="bg-white/80 dark:bg-gray-800/80 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">Available Rooms</p>
                            <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                {{ $stats['availableRooms'] }}</p>
                            <p class="text-sm text-luxury-500 dark:text-luxury-500">{{ $stats['occupancyRate'] }}%
                                occupancy rate</p>
                        </div>
                        <div class="p-3 bg-luxury-100 dark:bg-luxury-900/50 rounded-full">
                            <svg class="w-6 h-6 text-luxury-700 dark:text-luxury-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Guests -->
                <div
                    class="bg-white/80 dark:bg-gray-800/80 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">Total Guests</p>
                            <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                {{ $stats['totalGuests'] }}</p>
                            <p class="text-sm text-luxury-500 dark:text-luxury-500">{{ $stats['newGuestsThisMonth'] }}
                                new this month</p>
                        </div>
                        <div class="p-3 bg-luxury-100 dark:bg-luxury-900/50 rounded-full">
                            <svg class="w-6 h-6 text-luxury-700 dark:text-luxury-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Monthly Revenue -->
                <div
                    class="bg-white/80 dark:bg-gray-800/80 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">Monthly Revenue</p>
                            <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                ${{ number_format($stats['monthlyRevenue'], 2) }}</p>
                            <p class="text-sm text-luxury-500 dark:text-luxury-500">{{ $stats['revenueGrowth'] }}% vs
                                last month</p>
                        </div>
                        <div class="p-3 bg-luxury-100 dark:bg-luxury-900/50 rounded-full">
                            <svg class="w-6 h-6 text-luxury-700 dark:text-luxury-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Room Status Overview -->
            <div class="bg-white/90 dark:bg-gray-800/50 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur">
                <div class="p-6">
                    <h3 class="text-lg font-serif font-semibold text-luxury-800 dark:text-gold-300 mb-4">Room Status
                        Overview</h3>
                    <div class="grid gap-4 md:grid-cols-3">
                        <div
                            class="flex items-center justify-between p-4 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-gold-400">Available</p>
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400">
                                    {{ $stats['availableRooms'] }}</p>
                            </div>
                            <div class="p-2 bg-green-100 dark:bg-green-900/20 rounded-full">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-between p-4 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-gold-400">Occupied</p>
                                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                    {{ $stats['occupiedRooms'] }}</p>
                            </div>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/20 rounded-full">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-between p-4 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-gold-400">Maintenance</p>
                                <p class="text-2xl font-bold text-amber-600 dark:text-amber-400">
                                    {{ $stats['maintenanceRooms'] }}</p>
                            </div>
                            <div class="p-2 bg-amber-100 dark:bg-amber-900/20 rounded-full">
                                <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="grid gap-6 md:grid-cols-3">
                <div class="md:col-span-2">
                    <div
                        class="bg-white/80 dark:bg-gray-800/80 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-serif font-semibold text-luxury-800 dark:text-luxury-200">Recent
                                    Bookings</h3>
                                <a href="{{ route('bookings.index') }}"
                                    class="text-sm text-luxury-600 dark:text-luxury-400 hover:text-luxury-800 dark:hover:text-luxury-200">View
                                    All →</a>
                            </div>
                            @if ($recentBookings->isEmpty())
                                <p class="text-luxury-600 dark:text-luxury-400">No recent bookings</p>
                            @else
                                <div class="space-y-4">
                                    @foreach ($recentBookings as $booking)
                                        <div
                                            class="flex items-center justify-between p-4 bg-luxury-50/50 dark:bg-luxury-900/30 rounded-lg">
                                            <div class="flex items-center space-x-4">
                                                <div
                                                    class="p-2 bg-{{ $booking->status_color }}-100 dark:bg-{{ $booking->status_color }}-900/30 rounded-full">
                                                    <svg class="w-5 h-5 text-{{ $booking->status_color }}-600 dark:text-{{ $booking->status_color }}-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-luxury-900 dark:text-luxury-100">
                                                        {{ $booking->guest->name }}
                                                    </p>
                                                    <p class="text-sm text-luxury-600 dark:text-luxury-400">
                                                        Room {{ $booking->room->room_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm font-medium text-luxury-900 dark:text-luxury-100">
                                                    ${{ number_format($booking->total_amount, 2) }}
                                                </p>
                                                <p class="text-sm text-luxury-600 dark:text-luxury-400">
                                                    {{ $booking->check_in_date->format('M d') }} -
                                                    {{ $booking->check_out_date->format('M d') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div
                    class="bg-white/90 dark:bg-gray-800/50 overflow-hidden shadow-luxury gold-border rounded-lg bg-blur">
                    <div class="p-6">
                        <h3 class="text-lg font-serif font-semibold text-luxury-800 dark:text-gold-300 mb-4">Quick
                            Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('rooms.create') }}"
                                class="flex items-center p-3 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10 hover:bg-luxury-100 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 bg-luxury-100 dark:bg-gold-900/20 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-luxury-700 dark:text-gold-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <span class="text-luxury-800 dark:text-gold-300">Add New Room</span>
                            </a>

                            <a href="{{ route('bookings.create') }}"
                                class="flex items-center p-3 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10 hover:bg-luxury-100 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 bg-luxury-100 dark:bg-gold-900/20 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-luxury-700 dark:text-gold-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <span class="text-luxury-800 dark:text-gold-300">New Booking</span>
                            </a>

                            <a href="{{ route('guests.create') }}"
                                class="flex items-center p-3 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10 hover:bg-luxury-100 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 bg-luxury-100 dark:bg-gold-900/20 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-luxury-700 dark:text-gold-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                </div>
                                <span class="text-luxury-800 dark:text-gold-300">Register Guest</span>
                            </a>

                            <a href="{{ route('rooms.index') }}"
                                class="flex items-center p-3 bg-luxury-50/50 dark:bg-gray-800/50 rounded-lg border border-luxury-200/20 dark:border-gold-500/10 hover:bg-luxury-100 dark:hover:bg-gray-700/50 transition-colors">
                                <div class="p-2 bg-luxury-100 dark:bg-gold-900/20 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-luxury-700 dark:text-gold-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                </div>
                                <span class="text-luxury-800 dark:text-gold-300">View All Rooms</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
