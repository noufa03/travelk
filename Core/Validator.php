<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $greaterThan): bool
    {
        return $value > $greaterThan;
    }
     public static function smallerThan(int $value, int $smallerThan): bool
    {
        return $value < $smallerThan;
    }
    
    public static function isValidPhoneNumber(string $phoneNumber): bool
    {
        // Define a regex pattern for a valid phone number (supports various formats)
        $pattern = '/^\+?[0-9]{7,15}$/';
    
        return preg_match($pattern, $phoneNumber) === 1;
    }
    
    public static function isValidPassword(string $password): bool
    {
        // Check length (at least 9 characters)
        if (strlen($password) < 9) {
            return false;
        }
    
        // Check if it contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
    
        // Check if it contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
    
        // Check if it contains at least one digit
        if (!preg_match('/\d/', $password)) {
            return false;
        }
    
        // Check if it contains at least one special character
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }
    
        return true;
    }


}
