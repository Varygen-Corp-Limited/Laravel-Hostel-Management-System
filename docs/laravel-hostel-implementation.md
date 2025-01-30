# Laravel Hostel Management System - Implementation Guide

## 1. Database Setup

First, create the migrations:

```bash
php artisan make:migration create_rooms_table
php artisan make:migration create_guests_table
php artisan make:migration create_bookings_table
```

### Migration Files

#### create_rooms_table.php

```php
public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('room_number', 10)->unique();
        $table->integer('capacity');
        $table->decimal('price_per_night', 10, 2);
        $table->enum('status', ['available', 'occupied']);
        $table->timestamps();
    });
}
```

#### create_guests_table.php

```php
public function up()
{
    Schema::create('guests', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->string('phone', 20);
        $table->string('id_number', 50);
        $table->timestamps();
    });
}
```

#### create_bookings_table.php

```php
public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('guest_id')->constrained()->onDelete('cascade');
        $table->foreignId('room_id')->constrained()->onDelete('cascade');
        $table->date('check_in_date');
        $table->date('check_out_date');
        $table->enum('status', ['active', 'completed']);
        $table->decimal('total_amount', 10, 2);
        $table->timestamps();
    });
}
```

## 2. Create Models

```bash
php artisan make:model Room
php artisan make:model Guest
php artisan make:model Booking
```

### Model Definitions

#### Room.php

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'capacity',
        'price_per_night',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
```

#### Guest.php

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'id_number'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
```

#### Booking.php

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'status',
        'total_amount'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
```

## 3. Create Controllers

```bash
php artisan make:controller RoomController
php artisan make:controller GuestController
php artisan make:controller BookingController
```

### Controller Implementations

#### RoomController.php

```php
namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
```

#### GuestController.php

```php
namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'id_number' => 'required|string|max:50|unique:guests'
        ]);

        Guest::create($validated);
        return redirect()->route('guests.index')->with('success', 'Guest registered successfully');
    }
}
```

#### BookingController.php

```php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['guest', 'room'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        $guests = Guest::all();
        return view('bookings.create', compact('rooms', 'guests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $room = Room::find($request->room_id);
        $days = strtotime($request->check_out_date) - strtotime($request->check_in_date);
        $days = round($days / (60 * 60 * 24));

        $booking = Booking::create([
            'guest_id' => $validated['guest_id'],
            'room_id' => $validated['room_id'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'status' => 'active',
            'total_amount' => $room->price_per_night * $days
        ]);

        $room->update(['status' => 'occupied']);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking created successfully');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }
}
```

## 4. Create Views

### rooms/index.blade.php

```php
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Rooms</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($rooms as $room)
                            <div class="border p-4 rounded">
                                <h3 class="font-bold">Room {{ $room->room_number }}</h3>
                                <p>Capacity: {{ $room->capacity }}</p>
                                <p>Price: ${{ $room->price_per_night }}/night</p>
                                <p>Status: {{ $room->status }}</p>
                                <a href="{{ route('rooms.show', $room) }}" class="text-blue-500">View Details</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

### guests/create.blade.php

```php
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Register New Guest</h2>

                    <form method="POST" action="{{ route('guests.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block">Name</label>
                            <input type="text" name="name" class="border rounded w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block">Phone</label>
                            <input type="text" name="phone" class="border rounded w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block">ID Number</label>
                            <input type="text" name="id_number" class="border rounded w-full" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Register Guest
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

### bookings/create.blade.php

```php
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Create New Booking</h2>

                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block">Guest</label>
                            <select name="guest_id" class="border rounded w-full" required>
                                @foreach($guests as $guest)
                                    <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block">Room</label>
                            <select name="room_id" class="border rounded w-full" required>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">Room {{ $room->room_number }} - ${{ $room->price_per_night }}/night</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block">Check-in Date</label>
                            <input type="date" name="check_in_date" class="border rounded w-full" required>
                        </div>

                        <div class="mb-4">
                            <label class="block">Check-out Date</label>
                            <input type="date" name="check_out_date" class="border rounded w-full" required>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Create Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

## 5. Add Routes

In `routes/web.php`:

```php
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingController;

Route::middleware(['auth'])->group(function () {
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

    Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');
    Route::get('/guests/create', [GuestController::class, 'create'])->name('guests.create');
    Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
});
```

## 6. Create Database Seeder

```bash
php artisan make:seeder RoomSeeder
```

### RoomSeeder.php

```php
namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            ['room_number' => '101', 'capacity' => 2, 'price_per_night' => 100, 'status' => 'available'],
            ['room_number' => '102', 'capacity' => 2, 'price_per_night' => 100, 'status' => 'available'],
            ['room_number' => '103', 'capacity' => 3, 'price_per_night' => 150, 'status' => 'available'],
            ['room_number' => '201', 'capacity' => 2, 'price_per_night' => 100, 'status' => 'available'],
            ['room_number' => '202', 'capacity' => 4, 'price_per_night' => 200, 'status' => 'available'],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
```

## 7. Final Setup Steps

1. Run migrations:

```bash
php artisan migrate
```

2. Run seeder:

```bash
php artisan db:seed --class=RoomSeeder
```

3. Run the application:

```bash
php artisan serve
```

Your basic hostel management system is now ready to use! The system includes:

-   Room listing and detail views
-   Guest registration
-   Booking creation
-   Basic authentication (assuming Laravel Breeze is installed)

You can access the system at `http://localhost:8000` and navigate through the different features.
