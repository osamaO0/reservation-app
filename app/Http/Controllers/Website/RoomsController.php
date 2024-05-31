<?php

namespace App\Http\Controllers\Website;

use App\Enums\RoomStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\rooms\BookRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->type) {
            $rooms = Room::where('status', RoomStatusEnum::AVAILABLE)
             ->when($request?->type, function ($query, $type) {
                 return $query->where('type', $type);
             })
             ->get();
        } else {
            $rooms = Room::where('status', RoomStatusEnum::AVAILABLE)->get();
        }

        return view('website.rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        $room->load('media');
        return view('website.rooms.show', compact('room'));
    }

    public function book(Room $room, BookRoomRequest $request)
    {
        $room->bookings()->create($request->all());
        session()->flash('success', 'Room booked successfully');
        return redirect()->route('website.rooms.show', $room);
    }
}
