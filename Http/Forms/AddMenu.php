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
        if (empty($attributes['sizes']) || !is_array($attributes['sizes'])) {// if it is empty or not an array
             $this->errors['sizes'] = 'Choose at least 1 portion size.';
        }
        if (!Validator::string($attributes['description'],1,100)) {
            $this->errors['description'] = 'The description should be not more than 100 characters.';
    
        if (isset($attributes['prices']['small'], $attributes['prices']['medium'])  && !empty($attributes['prices']['small']) && !empty($attributes['prices']['medium'])) {
            if (!Validator::greaterThanEqual((int)$attributes['prices']['medium'], (int)$attributes['prices']['small'])) {
                $this->errors['prices'][] = 'Invalid price marking, price medium should be greater than price small';
            }
        } 
                
        
        if (isset($attributes['prices']['medium'], $attributes['prices']['large']) && !empty($attributes['prices']['large']) && !empty($attributes['prices']['medium']) ) {
            if (!Validator::greaterThanEqual((int)$attributes['prices']['large'], (int)$attributes['prices']['medium'])) {
                $this->errors['prices'][] = 'Invalid price marking, price large should be greater than price medium';
            }
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