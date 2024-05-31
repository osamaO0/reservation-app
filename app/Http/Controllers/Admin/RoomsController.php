<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\rooms\StoreRoomRequest;
use App\Http\Requests\rooms\UpdateRoomRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAll();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $this->roomService->store($request);
        session()->flash('success', 'Room created successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = $this->roomService->getById($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, string $id)
    {
        $this->roomService->update($id, $request->all());
        session()->flash('success', 'Room updated successfully');
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roomService->delete($id);
        session()->flash('success', 'Room deleted successfully');
        return redirect()->route('rooms.index');
    }

    public function deleteImage(Room $room, $mediaItem)
    {
        $room->deleteMedia($mediaItem);

        return redirect()->back();
    }
}
