<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class BookingController extends Controller
{
    public function showBookingForm(Service $service)
{
    $bookedSlots = Booking::where('service_id', $service->id)
        ->pluck('date', 'time')
        ->toArray();

    return view('booking.form', compact('service', 'bookedSlots'));
}


    public function bookAppointment(Request $request, Service $service)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required'
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $service->id,
            'date' => $request->date,
            'time' => $request->time
        ]);

        return redirect()->route('services.show', $service->id)->with('success', 'Вы успешно записались!');
 
    }
    public function index()
{
    $bookings = Booking::with(['service', 'user'])->latest()->get();

    return view('admin.bookings.index', compact('bookings'));
}

public function destroy(Booking $booking)
{
    $booking->delete();

    return redirect()->route('admin.bookings.index')->with('success', 'Бронирование удалено!');
}

public function showUserBookings()
{
    $bookings = Booking::where('user_id', Auth::id())->with('service')->get();

    return view('user.bookings.index', compact('bookings'));
}
public function edit(Booking $booking)
{
    return view('admin.bookings.edit', compact('booking'));
}

public function update(Request $request, Booking $booking)
{
    $request->validate([
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required'
    ]);

    $booking->update([
        'date' => $request->date,
        'time' => $request->time
    ]);

    return redirect()->route('admin.bookings.index')->with('success', 'Бронирование успешно перенесено!');
}
public function create()
{
    $services = Service::all();
    $users = User::all();
    
    return view('admin.bookings.create', compact('services', 'users'));
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'service_id' => 'required|exists:services,id',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|string',
    ]);

    Booking::create([
        'user_id' => $request->user_id,
        'service_id' => $request->service_id,
        'date' => $request->date,
        'time' => $request->time,
    ]);

    return redirect()->route('admin.bookings.index')->with('success', 'Бронирование успешно добавлено!');
}

    
}
