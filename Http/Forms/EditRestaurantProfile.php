<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;



class EditRestaurantProfile
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        
      
        
        if (!Validator::string($attributes['operatingHoursFrom']) || !Validator::string($attributes['operatingHoursTo']) ) {
            $this->errors['operatingHours'] = '*Operating hours are required.';
        }
         if (!Validator::string($attributes['operatingdaysFrom']) || !Validator::string($attributes['operatingdaysTo']) ) {
            $this->errors['operatingdays'] = '*Operating days are required.';
        }

        if (!Validator::string($attributes['hot_line'],8,15)) {
            $this->errors['hot_line'] = '**Invalid hotline number.';
        }
        if (!Validator::string($attributes['seatingCapacity'],1,3)) {
            $this->errors['seatingCapacity'] = '**Invalid seating capacity.';
        }
        if (!Validator::string($attributes['street_address'])) {
            $this->errors['street_address'] = '**Street address cannot be left blank.';
        }

        if (!Validator::string($attributes['city'])) {
            $this->errors['city'] = '**City is required.';
        }
         if (!Validator::string($attributes['display_name'])) {
            $this->errors['display_name'] = '**display_name is required.';
        }
        if (!Validator::string($attributes['district'])) {
            $this->errors['district'] = '**Please select a district.';
        }

        if (!Validator::isValidgooglemapurl($attributes['google_map_link'])) {
            $this->errors['google_map_link'] = '**Please provide a valid Google Maps link to your location.';
        }
        
          if (empty($attributes['deliveryOptions']) || !is_array($attributes['deliveryOptions'])) {// if it is empty or not an array
             $this->errors['deliveryOptions'] = 'Choose at least 1 Option.';
        }
          if (empty($attributes['paymentMethods']) || !is_array($attributes['paymentMethods'])) {// if it is empty or not an array
             $this->errors['paymentMethods'] = 'Choose at least 1 Option.';
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
