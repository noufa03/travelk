<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddSizes
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {

        if (!Validator::string($attributes['size_name'])) {
            $this->errors['size_name'] = 'Please choose a valid size type.';
        }
        
          if (!Validator::string($attributes['price'],3,10)) {
            $this->errors['price'] = 'Please choose a valid price';
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