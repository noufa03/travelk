<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterFormRental
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
        if(!Validator::string($attributes['first_name'])){
            $this->errors['first_name'] = 'Please provide a valid first name.';
        
        }
         if(!Validator::string($attributes['last_name'])){
            $this->errors['last_name'] = 'Please provide a valid last name.';
        
        }
        if(!Validator::string($attributes['address'])){
            $this->errors['address'] = 'Please provide a valid address.';
        
        }
         if(!Validator::string($attributes['gender'])){
            $this->errors['gender'] = 'Please  select a option.';
        
        }
        
         if(!Validator::string($attributes['membership_status'])){
            $this->errors['membership_status'] = 'Please  select a option.';
        
        }
         if(!Validator::string($attributes['license_number'])){
            $this->errors['license_number'] = 'Please provide a valid license number.';
        
        }
     
     
         //license issue date and expiry date
        if(!Validator::isValidPastDate($attributes['license_issue_date'])){
        $this->errors['license_issue_date']='Invalid issue date';
        
        }
        // return true for  expiry
        if(Validator::isValidPastDate($attributes['license_expiry_date'])){
        $this->errors['license_expiry_date']='Invalid expiry date';
        
        }
             
             

         if(! Validator::isValidPhoneNumber($attributes['phone_number'])){
            $this->errors['phone_number'] = 'Invalid number,please check again';
        
        }
        
       
        if(! Validator::isValidDob(($attributes['date_of_birth']))){
            $this->errors['date_of_birth']='Invalid DOB,please check again';
        
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