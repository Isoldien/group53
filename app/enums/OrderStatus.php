<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Packed = 'packed';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
}
