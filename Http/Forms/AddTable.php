<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddTable
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
       if (! Validator::string($attributes['tablepricetype'])) {
            $this->errors['tablepricetype'] = 'Choose a type is required.';
        }

        if (! Validator::string($attributes['category'])) {
            $this->errors['category'] = 'Choosing a category is required.';
        }
        if (! Validator::string($attributes['nooftables'])) {
            $this->errors['nooftables'] = 'Adding number of tables is required.';
        }
        if($attributes['tablepricetype'] !== 'NoCharge'){
            if (! Validator::string($attributes['tableprice'])) {
                $this->errors['tableprice'] = 'Invalid price.';
        }
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}