<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterFormRestaurant
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

      
         if(! Validator::isValidPassword($attributes['password'])){
            $this->errors['password'] = 'Password must be at least 9 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
            
          }
        
        if(! Validator::isValidPhoneNumber($attributes['emergencyContact'])){
             $this->errors['emergencyContact'] = 'Invalid number,please check again';

         }
            
            
        if(!Validator::string($attributes['businessRegNo'])){
            $this->errors['businessRegNo'] = 'Please provide a Valid registration number';
        }
        
         if(!Validator::string($attributes['businessType'])){
            $this->errors['businessType'] = 'Please choose your business type';
        }
         if(!Validator::string($attributes['ownerName'])){
            $this->errors['ownerName'] = 'Please provide a name';
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