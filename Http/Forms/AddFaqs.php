<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AddFaqs
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
       if (! Validator::string($attributes['question'], 1, 100)) {
            $this->errors['question'] = 'A question of no more than 100 characters is required.';
        }

        if (! Validator::string($attributes['answer'], 1, 100)) {
            $this->errors['answer'] = 'A answer of no more than 100 characters is required.';
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