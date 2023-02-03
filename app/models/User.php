<?php

namespace app\models;

use core\Db;

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

    public function checkUnique()
    {
        $user = Db::findOne('users', 'email', $this->attributes['email']);
        if (!$user) {
            return false;
        } else {
            return true;
        }
    }

    public static function checkAuth(): bool
    {
        return isset($_SESSION['user']);
    }
}
