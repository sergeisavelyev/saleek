<?php

namespace app\models;

class User extends AppModel
{
    public array $attributes = [
        'email' => '',
        'login' => '',
        'password' => '',
    ];

    public array $rules = [
        'required' => ['email', 'login', 'password'],
        'email' => ['email'],
        'lengthMin' => [
            ['password', 6],
        ],
    ];

    public static function checkAuth(): bool
    {
        return isset($_SESSION['user']);
    }
}
