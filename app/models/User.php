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

    public array $labels = [
        'email' => 'user_signup_input_email',
        'login' => 'user_signup_input_login',
        'password' => 'user_signup_input_password',
    ];

    public static function checkAuth(): bool
    {
        return isset($_SESSION['user']);
    }
}
