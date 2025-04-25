<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddReservations
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email(traveler)'])) {
            $this->errors['email(traveler)'] = 'Please provide a valid email address.';
        }

        if (empty($attributes['reservation_date'])) {
            $this->errors['reservation_date'] = ' Invalid reservation date.';
        }
        if(!Validator::string($attributes['specialrequests'],0,100)){
            $this->errors['specialrequests']='Not more than 100 characters';
        }
          if(!Validator::string($attributes['tablename'])){
            $this->errors['tablename']='Choose a table name';
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