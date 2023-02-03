<?php

namespace core;

use Valitron\Validator;
use core\App;
use core\Db;

abstract class Model
{
    public array $attributes = [];
    public array $labels = [];
    public array $errors = [];
    public array $rules = [];

    public function __construct()
    {
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validate($data): bool
    {
        Validator::langDir(APP . '/languages/validator/lang');
        Validator::lang(App::$app->getProperty('language')['code']);
        $validator = new Validator($data);
        $validator->rules($this->rules);
        $validator->labels($this->getLabes());
        if ($validator->validate()) {
            return true;
        } else {
            $this->errors = $validator->errors();
            return false;
        }
    }

    public function getErrors()
    {
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors[] = $item;
                return $errors;
            }
        }
    }

    public function getLabes(): array
    {
        $labels = [];
        foreach ($this->labels as $k => $v) {
            $labels[$k] = ___($v);
        }
        return $labels;
    }

    public function save($name)
    {
        return Db::query("INSERT INTO $name (email, password, login) VALUE (:email, :password, :login)", $this->attributes);
    }
}
