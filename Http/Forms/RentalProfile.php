<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RentalProfile
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::file($attributes['profile_picture'], ['jpg', 'jpeg', 'png'], 1 * 1024 * 1024)) {
            $this->errors['profile_picture'] = '**Img should be in jpeg,png,jpg and it should not exceed 1MB';
        }
        if (!Validator::string($attributes['payment_methods'])) {
            $this->errors['payment_methods'] = '*Please select a payment method (Yes or No).';
        }

        if (!Validator::string($attributes['vehicle_type'])) {
            $this->errors['vehicle_type'] = '**Vehicle type is required.';
        }
       
        
        if (!Validator::string($attributes['vehicle_model'])) {
            $this->errors['vehicle_model'] = '**Vehicle model is required.';
        }
        if (!Validator::string($attributes['street_address'])) {
            $this->errors['street_address'] = '**Street address cannot be left blank.';
        }

        if (!Validator::string($attributes['city'])) {
            $this->errors['city'] = '**City is required.';
        }
        if (!Validator::string($attributes['district'])) {
            $this->errors['district'] = '**Please select a district.';
        }

        if (!Validator::isValidgooglemapurl($_POST['google_map_link'])) {
            $this->errors['google_map_link'] = '**Please provide a valid Google Maps link to your location.';
        }

        if (!empty($attributes['phone_number'])) {
            if (!Validator::isValidPhoneNumber($attributes['phone_number'])) {
                $this->errors['google_map_link'] = '**Please provide a valid phone number.';
            }
        }

        if (!empty($attributes['license_number'])) {
            if (!Validator::string($attributes['license_number'])) {
                $this->errors['license_number'] = 'Please provide a valid license number.';
            }
        }
        if (!empty($attributes['license_issue_date'])) {
            //license issue date and expiry date
            if (!Validator::isValidPastDate($attributes['license_issue_date'])) {
                $this->errors['license_issue_date'] = 'Invalid issue date';
            }
        }
        if (!empty($attributes['license_expiry_date'])) {
            // return true for  expiry
            if (Validator::isValidPastDate($attributes['license_expiry_date'])) {
                $this->errors['license_expiry_date'] = 'Invalid expiry date';
            }
        }
       
        
         if (!Validator::string($attributes['hourlyrate'])) {
            $this->errors['hourlyrate'] = '**rate is required.';
        }
          if (!Validator::string($attributes['numberplate'])) {
           $this->errors['numberplate'] = '**Please provide the vehicle’s number plate.';

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
