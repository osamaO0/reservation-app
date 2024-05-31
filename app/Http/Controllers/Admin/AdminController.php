<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $rooms = Room::count();
        $acceptedBookings = Booking::where('status', BookingStatusEnum::CONFIRMED->value)->count();
        $canceledBookings = Booking::where('status', BookingStatusEnum::CANCELLED->value)->count();
        return view('admin.index', compact('users', 'rooms','acceptedBookings', 'canceledBookings'));
    }
}
