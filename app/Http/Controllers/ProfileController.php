<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->with('service')->latest()->get();

        return view('profile.index', compact('user', 'bookings'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id === Auth::id()) {
            $booking->delete();
        }

        return redirect()->route('profile.index')->with('success', 'Запись отменена');
    }
}
