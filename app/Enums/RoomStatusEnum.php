<?php

namespace App\Enums;

enum RoomStatusEnum:int
{
    case AVAILABLE = 1;
    case PENDING = 2;
    case BOOKED = 3;
}
