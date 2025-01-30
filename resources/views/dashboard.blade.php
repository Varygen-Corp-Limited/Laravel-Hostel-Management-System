<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="text-sm text-luxury-600 dark:text-luxury-400">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Active Bookings -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">
                                    Active Bookings
                                </p>
                                <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                    {{ $stats['activeBookings'] }}
                                </p>
                                <p class="text-xs text-luxury-500 dark:text-luxury-500 mt-1">
                                    {{ $stats['checkoutsToday'] }} checkouts today
                                </p>
                            </div>
                            <div class="p-3 bg-luxury-100 dark:bg-luxury-900 rounded-full">
                                <svg class="w-6 h-6 text-luxury-600 dark:text-luxury-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Available Rooms with Categories -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">
                                    Available Rooms
                                </p>
                                <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                    {{ $stats['availableRooms'] }}
                                </p>
                                <p class="text-xs text-luxury-500 dark:text-luxury-500 mt-1">
                                    {{ $stats['occupancyRate'] }}% occupancy rate
                                </p>
                            </div>
                            <div class="p-3 bg-luxury-100 dark:bg-luxury-900 rounded-full">
                                <svg class="w-6 h-6 text-luxury-600 dark:text-luxury-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registered Guests -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">
                                    Total Guests
                                </p>
                                <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                    {{ $stats['totalGuests'] }}
                                </p>
                                <p class="text-xs text-luxury-500 dark:text-luxury-500 mt-1">
                                    {{ $stats['newGuestsThisMonth'] }} new this month
                                </p>
                            </div>
                            <div class="p-3 bg-luxury-100 dark:bg-luxury-900 rounded-full">
                                <svg class="w-6 h-6 text-luxury-600 dark:text-luxury-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Revenue -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-luxury-600 dark:text-luxury-400">
                                    Monthly Revenue
                                </p>
                                <p class="text-2xl font-bold text-luxury-900 dark:text-luxury-100">
                                    ${{ number_format($stats['monthlyRevenue'], 2) }}
                                </p>
                                <p class="text-xs text-luxury-500 dark:text-luxury-500 mt-1">
                                    {{ $stats['revenueGrowth'] }}% vs last month
                                </p>
                            </div>
                            <div class="p-3 bg-luxury-100 dark:bg-luxury-900 rounded-full">
                                <svg class="w-6 h-6 text-luxury-600 dark:text-luxury-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Bookings (Wider) -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-luxury-900 dark:text-luxury-100">
                                Recent Bookings
                            </h3>
                            <a href="{{ route('bookings.index') }}"
                                class="text-sm text-luxury-600 dark:text-luxury-400 hover:text-luxury-700 dark:hover:text-luxury-300">
                                View All →
                            </a>
                        </div>
                        <div class="space-y-4">
                            @forelse($recentBookings as $booking)
                                <div
                                    class="flex items-center justify-between p-4 bg-luxury-50 dark:bg-luxury-900/50 rounded-lg hover:bg-luxury-100 dark:hover:bg-luxury-900/70 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="p-2 bg-{{ $booking->status_color }}-100 dark:bg-{{ $booking->status_color }}-900/30 rounded-full">
                                            <svg class="w-5 h-5 text-{{ $booking->status_color }}-600 dark:text-{{ $booking->status_color }}-400"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-luxury-900 dark:text-luxury-100">
                                                {{ $booking->guest->name }}
                                            </p>
                                            <p class="text-sm text-luxury-600 dark:text-luxury-400">
                                                Room {{ $booking->room->room_number }} •
                                                {{ $booking->check_in_date->format('M d') }} -
                                                {{ $booking->check_out_date->format('M d') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full
                                            {{ $booking->status === 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : '' }}
                                            {{ $booking->status === 'completed' ? 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400' : '' }}
                                            {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : '' }}
                                        ">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                        <a href="{{ route('bookings.show', $booking) }}"
                                            class="text-sm text-luxury-600 dark:text-luxury-400 hover:text-luxury-700 dark:hover:text-luxury-300">
                                            View →
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-luxury-600 dark:text-luxury-400">No recent bookings</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Quick Actions and Today's Schedule -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-luxury-900 dark:text-luxury-100 mb-4">
                                Quick Actions
                            </h3>
                            <div class="grid grid-cols-1 gap-4">
                                <!-- Add Room Action -->
                                <a href="{{ route('rooms.create') }}"
                                    class="flex items-center p-4 bg-luxury-50 dark:bg-luxury-900/50 rounded-lg hover:bg-luxury-100 dark:hover:bg-luxury-900/70 transition-colors">
                                    <div class="p-2 bg-luxury-100 dark:bg-luxury-900 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-luxury-600 dark:text-luxury-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-luxury-900 dark:text-luxury-100">
                                        Add New Room
                                    </span>
                                </a>

                                <!-- Existing New Booking Action -->
                                <a href="{{ route('bookings.create') }}"
                                    class="flex items-center p-4 bg-luxury-50 dark:bg-luxury-900/50 rounded-lg hover:bg-luxury-100 dark:hover:bg-luxury-900/70 transition-colors">
                                    <div class="p-2 bg-luxury-100 dark:bg-luxury-900 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-luxury-600 dark:text-luxury-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-luxury-900 dark:text-luxury-100">
                                        New Booking
                                    </span>
                                </a>

                                <!-- Existing Register Guest Action -->
                                <a href="{{ route('guests.create') }}"
                                    class="flex items-center p-4 bg-luxury-50 dark:bg-luxury-900/50 rounded-lg hover:bg-luxury-100 dark:hover:bg-luxury-900/70 transition-colors">
                                    <div class="p-2 bg-luxury-100 dark:bg-luxury-900 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-luxury-600 dark:text-luxury-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-luxury-900 dark:text-luxury-100">
                                        Register Guest
                                    </span>
                                </a>

                                <!-- View All Rooms -->
                                <a href="{{ route('rooms.index') }}"
                                    class="flex items-center p-4 bg-luxury-50 dark:bg-luxury-900/50 rounded-lg hover:bg-luxury-100 dark:hover:bg-luxury-900/70 transition-colors">
                                    <div class="p-2 bg-luxury-100 dark:bg-luxury-900 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-luxury-600 dark:text-luxury-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-luxury-900 dark:text-luxury-100">
                                        View All Rooms
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Schedule -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-luxury-900 dark:text-luxury-100 mb-4">
                                Today's Schedule
                            </h3>
                            <div class="space-y-4">
                                @if ($stats['checkoutsToday'] > 0)
                                    <div class="p-4 bg-red-50 dark:bg-red-900/10 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="p-2 bg-red-100 dark:bg-red-900/30 rounded-full mr-3">
                                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-red-900 dark:text-red-100">
                                                    {{ $stats['checkoutsToday'] }} Checkouts Today
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($stats['checkinsToday'] > 0)
                                    <div class="p-4 bg-green-50 dark:bg-green-900/10 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-full mr-3">
                                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-green-900 dark:text-green-100">
                                                    {{ $stats['checkinsToday'] }} Check-ins Today
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($stats['checkoutsToday'] === 0 && $stats['checkinsToday'] === 0)
                                    <p class="text-luxury-600 dark:text-luxury-400">No scheduled activities for today
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Room Status Overview -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-luxury-900 dark:text-luxury-100 mb-4">
                        Room Status Overview
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <!-- Available Rooms -->
                        <div class="p-4 bg-green-50 dark:bg-green-900/10 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-green-800 dark:text-green-200">Available</p>
                                    <p class="text-2xl font-bold text-green-900 dark:text-green-100">
                                        {{ $stats['availableRooms'] }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Occupied Rooms -->
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/10 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Occupied</p>
                                    <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">
                                        {{ $stats['occupiedRooms'] }}
                                    </p>
                                </div>
                                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Maintenance Rooms -->
                        <div class="p-4 bg-yellow-50 dark:bg-yellow-900/10 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Maintenance</p>
                                    <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">
                                        {{ $stats['maintenanceRooms'] }}
                                    </p>
                                </div>
                                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
