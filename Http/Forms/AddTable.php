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

        if (! Validator::string($attributes['seatcapacity'])) {
            $this->errors['seatcapacity'] = 'Adding number of seats is required.';
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
