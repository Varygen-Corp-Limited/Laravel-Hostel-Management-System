<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingController;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stats = [
        'roomCount' => Room::count(),
        'guestCount' => Guest::count(),
    ];

    $availableRooms = Room::where('status', 'available')->count();

    $roomTypes = [
        [
            'name' => 'Deluxe Room',
            'description' => 'Spacious room with city view',
            'price' => Room::where('capacity', 2)->value('price_per_night') ?? 100.00,
            'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
            'name' => 'Premium Suite',
            'description' => 'Luxury suite with panoramic view',
            'price' => Room::where('capacity', 3)->value('price_per_night') ?? 150.00,
            'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
        [
            'name' => 'Royal Suite',
            'description' => 'Ultimate luxury experience',
            'price' => Room::where('capacity', 4)->value('price_per_night') ?? 200.00,
            'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
        ],
    ];

    return view('welcome', compact('stats', 'availableRooms', 'roomTypes'));
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rooms
    Route::resource('rooms', RoomController::class);

    // Guests
    Route::resource('guests', GuestController::class);

    // Bookings
    Route::resource('bookings', BookingController::class);
    Route::patch('/bookings/{booking}/checkout', [BookingController::class, 'checkout'])->name('bookings.checkout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
