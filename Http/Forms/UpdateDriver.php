<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class UpdateDriver
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
       if (! Validator::string($attributes['name'])) {
            $this->errors['name'] = '**Please provide a valid name.';
        }

        if (! Validator::string($attributes['license_number'], 7, 16)) {
            $this->errors['license_number'] = '**license number should be in between 7 to 16 characters.';
        }
        if (! Validator::string($attributes['hourlyrate_driver'])) {
            $this->errors['hourlyrate_driver'] = '**Please provide a valid rate.';
        }
        if (!Validator::isValidPhoneNumber($attributes['phone_number'])) {
            $this->errors['google_map_link'] = '**Please provide a valid phone number.';
         }
         
        if (!Validator::isValidPastDate($attributes['license_issue_date'])) {
            $this->errors['license_issue_date'] = 'Invalid issue date';
         
        }
        if (Validator::isValidPastDate($attributes['license_expiry_date'])) {
            $this->errors['license_expiry_date'] = 'Invalid expiry date';
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