<?php

namespace App\Http\Resources;

use App\Enums\RoomStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $status = $this->status;
        if ($this->status == RoomStatusEnum::AVAILABLE) {
            $status = 'available';
        }
        elseif ($this->status == RoomStatusEnum::PENDING) {
            $status = 'pending';
        }
        else
        {
            $status = 'booked';
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $status,
            'images' => ImageResource::collection($this->getMedia("images")),
            'created_at' => $this->created_at,
        ];
    }
}
