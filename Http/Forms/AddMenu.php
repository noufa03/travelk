<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddMenu
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {

        if (!Validator::string($attributes['cuisine_name'])) {
            $this->errors['cuisine_name'] = 'Please provide a valid cuisine name.';
        }
        
        if (!Validator::string($attributes['cuisine_type'])) {
            $this->errors['cuisine_type'] = 'Please choose a valid cuisine type.';
        }
        if (!Validator::file($attributes['photo'],['jpeg','png','jpg'],1*1024*1024)) {
            $this->errors['photo'] = 'Img should be in jpeg,png,jpg and it should not exceed 1MB.';
        }
       
        if (!Validator::string($attributes['description'],1,100)) {
            $this->errors['description'] = 'The description should be not more than 100 characters.';
    
    

        
        
       
        
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