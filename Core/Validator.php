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
        return $value >$greaterThan;
    }
     public static function greaterThanEqual(int $value, int $greaterThan): bool
    {
        return $value >=$greaterThan;
    }
     public static function smallerThan(int $value, int $smallerThan): bool
    {
        return $value < $smallerThan;
    }
    
      public static function smallerThanEqual(int $value, int $smallerThan): bool
    {
        return $value <= $smallerThan;
    }
    
    public static function isValidPhoneNumber(string $phoneNumber): bool
    {
    
        $pattern = '/^\+?[0-9]{7,15}$/';
    
        return preg_match($pattern, $phoneNumber) === 1;
    }
    
    public static function isValidPassword(string $password): bool
    {
      
        if (strlen($password) < 9) {
            return false;
        }
    
     
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
    
     
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
    
      
        if (!preg_match('/\d/', $password)) {
            return false;
        }
    
        
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }
    
        return true;
    }
    
        public static function isValidPastDate($date): bool
        {
            if (is_string($date)) {
                $date = new \DateTime($date);
            }
        
            $today = new \DateTime();
        
            return $date <= $today;
        }

        public static function isValidDob($dob): bool
        {
            if (is_string($dob)) {
                $dob = new \DateTime($dob);
            }
        
            
            if (!Validator::isValidPastDate($dob)) {
                return false;
            }
        
            $today = new \DateTime();
            $age = $today->diff($dob)->y;
        
            return $age >= 18;
        }

        public static function isValidgooglemapurl($maplink):bool
        {
        if(!filter_var($maplink,FILTER_VALIDATE_URL)){
        return false;
        
        }
        
        
        return true;
        
        }
        
        public static function file($file, $allowedExtensions = [], $maxSize = INF)
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        $fileSize = $file['size'];
        $fileNameCmps = explode(".", $file['name']);
        $fileExtension = strtolower(end($fileNameCmps));

        if (!in_array($fileExtension, $allowedExtensions)) {
            return false;
        }

        if ($fileSize > $maxSize) {
            return false;
        }

        return true;
    }




}
