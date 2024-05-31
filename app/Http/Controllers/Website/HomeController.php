<?php

namespace App\Http\Controllers\Website;

use App\Enums\RoomStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('website.home');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = Room::query();
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('status', RoomStatusEnum::AVAILABLE)->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            }
        $rooms = $query->get();
        return view('website.search', compact('rooms'));
    }
}
