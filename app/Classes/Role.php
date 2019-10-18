<?php

namespace App\Classes;

class Role
{
    const USER = 1;
    const MODERATOR = 2;
    const ADMIN = 3;

    public static $names = [
        self::USER => 'User',
        self::MODERATOR => 'Moderator',
        self::ADMIN => 'Admin',
    ];
}
