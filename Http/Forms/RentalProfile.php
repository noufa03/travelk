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
