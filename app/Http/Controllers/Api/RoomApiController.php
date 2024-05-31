<?php

namespace App\Http\Controllers\Api;

use App\Enums\RoomStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRoomApiRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class RoomApiController extends Controller
{
    use ApiTrait;

    public function search(Request $request)
    {
        $search = $request->search ?? '';
        $rooms = Room::where('status', RoomStatusEnum::AVAILABLE->value)->where('name', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%');
        $paginatedRooms = $this->paginatedResult($rooms, $request->per_page);
        return $this->returnData(
            'data',
            RoomResource::collection($paginatedRooms),
            'Rooms has been fetched',
            200
        );
    }

    public function book(BookRoomApiRequest $request, $id)
    {
        $room = Room::find($id);
        if ($room->status = RoomStatusEnum::AVAILABLE->value) {
            $room->status = RoomStatusEnum::BOOKED->value;
            $room->save();
            return $this->returnData(
                'data',
                new RoomResource($room),
                'Room has been booked',
                200
            );
        } else {
            return $this->errorMessage('Room is already booked or pending', 401);
        }
    }
}
