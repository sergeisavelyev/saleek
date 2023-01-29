<?php

namespace core;

use Valitron\Validator;

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
        $validator = new Validator($data);
        $validator->rules($this->rules);
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
}
