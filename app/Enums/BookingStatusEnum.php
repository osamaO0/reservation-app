<?php
namespace App\Enum;


enum BookingStatusEnum:int
{
    case PENDING = 1;
    case CONFIRMED = 2;
    case CANCELLED = 3;
}
