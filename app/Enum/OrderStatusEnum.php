<?php

namespace App\Enum;

enum OrderStatusEnum : string
{
    case None = 'NONE';
    case Pending = 'PENDING';
    case Processing = 'PROCESSING';
    case Shipped = 'SHIPPED';
    case Delivered = 'DELIVERED';
}
