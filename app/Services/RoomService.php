<?php

namespace App\Services;

use App\Enums\RoomStatusEnum;
use App\Models\Room;

class RoomService extends BaseService
{
    public function __construct(Room $room)
    {
        parent::__construct($room);
    }

    public function store($request)
    {
        $request['status'] = RoomStatusEnum::AVAILABLE->value;
        $room = $this->model->create($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $room->addMedia($image)->toMediaCollection('images');
            }
        }
        return $room;
    }

    public function update($id, array $data)
    {
        $room = $this->model->find($id);
        $room->update($data);
        if ($data['images']) {
            foreach ($data['images'] as $image) {
                $room->addMedia($image)->toMediaCollection('images');
            }
        }
        return $room;
    }
}
