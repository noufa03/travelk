<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddOffers
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes['offer_title'])) {
            $this->errors['offer_title'] = 'Please add a valid offer title.';
        }

        if (!Validator::string($attributes['cuisine_name'])) {
            $this->errors['cuisine_name'] = 'Please choose a valid cuisine name.';
        }

        if (!Validator::string($attributes['offer_description'], 1, 100)) {
            $this->errors['offer_description'] = 'Description should be between 1 and 100 characters.';
        }

        if (!Validator::string($attributes['discount_percentage'], 1, 2)) {
            $this->errors['discount_percentage'] = 'Invalid discount percentage.';
        }

   
        if (!empty($attributes['start_time']) || !empty($attributes['end_time'])) {
            if (strtotime($attributes['start_time']) >= strtotime($attributes['end_time'])) {
                $this->errors['time'] = 'Start time must be before end time.';
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
        return count($this->errors) > 0;
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
