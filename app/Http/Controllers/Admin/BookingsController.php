<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{

    public function index()
    {

        $pendingBookings = Booking::with('user', 'bookable')->where('status', BookingStatusEnum::PENDING)->get();
        $acceptedBookings = Booking::with('user', 'bookable')->where('status', BookingStatusEnum::CONFIRMED)->get();
        $rejectedBookings = Booking::with('user', 'bookable')->where('status', BookingStatusEnum::CANCELLED)->get();
        return view('admin.bookings.index', compact('pendingBookings', 'acceptedBookings', 'rejectedBookings'));
    }

    public function accept(Request $request, string $id)
    {
        $booking = Booking::find($id);
        $booking->status = BookingStatusEnum::CONFIRMED;
        $booking->save();
        session()->flash('success', 'Booking accepted successfully');
        return redirect()->back();
    }

    public function reject(Request $request, string $id)
    {
        $booking = Booking::find($id);
        $booking->status = BookingStatusEnum::CANCELLED;
        $booking->save();
        session()->flash('success', 'Booking rejected successfully');
        return redirect()->back();
    }
}
