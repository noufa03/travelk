<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterFormHotel
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

      
         if(! Validator::isValidPassword($attributes['password'])){
            $this->errors['password'] = "Password must be 9+ characters with uppercase, lowercase, number, and special character";
            
          }
            
        if(!Validator::string($attributes['business_reg_num'])){
            $this->errors['business_reg_num'] = 'Please provide a Valid registration number';
        }
        
         if(!Validator::isValidPhoneNumber($attributes['owner_contact'])){
            $this->errors['owner_contact'] = 'Invalid number,please check again';
        }
         if(!Validator::string($attributes['owner_name'])){
            $this->errors['owner_name'] = 'Please provide a name';
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