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
        'email' => 'tpl_user_signup_input_email',
        'login' => 'tpl_user_signup_input_login',
        'password' => 'tpl_user_signup_input_password',
    ];

    public function checkUnique(): bool
    {
        $user = Db::findOne('users', 'email = ?', $this->attributes['email']);
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

    public function login($admin = false)
    {
        $login = $_POST['email'];
        $password = $_POST['password'];
        if ($login && $password) {
            if ($admin) {
                $user = Db::findOne('users', 'email = ? AND role = admin', $login);
            } else {
                $user = Db::findOne('users', 'email = ?', $login);
            }
        } else {
            return false;
        }

        if ($user) {
            foreach ($user as $key => $user_data) {
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['user']['id'] = $key;
                    foreach ($user_data as $k => $v) {
                        if ($k != 'password') {
                            $_SESSION['user'][$k] = $v;
                        }
                    }
                    return true;
                }
            }
        }

        return false;
    }
}
