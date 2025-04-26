<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddTable
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (! Validator::string($attributes['tablepricetype'])) {
            $this->errors['tablepricetype'] = 'Choose a type is required.';
        }

        if (!is_numeric($attributes['seatcapacity']) || $attributes['seatcapacity'] < 1 || $attributes['seatcapacity'] > 20) {
            $this->errors['seatcapacity'] = 'Seat capacity must be a number between 1 and 20.';
        }


        if (!isset($attributes['tablename']) || !Validator::string($attributes['tablename'])) {
            $this->errors['tablename'] = 'Table name is required to uniquely identify each table.';
        }


        if ($attributes['tablepricetype'] !== 'NoCharge') {
            if (! Validator::string($attributes['tableprice'])) {
                $this->errors['tableprice'] = 'Invalid price.';
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
