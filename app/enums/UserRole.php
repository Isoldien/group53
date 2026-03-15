<?php

namespace App\enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Customer = 'customer';
}
