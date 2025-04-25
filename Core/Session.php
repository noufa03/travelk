<?php

namespace Core;

class Session
{
    public static function has($key)
    {//Checks if a session variable exists and is truthy.and internally calls get
         return (bool) static::get($key);
    }

    public static function put($key, $value)
    {//set a key value in the session,$key=user,$vaalue=email,role
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {//retrives a session value,first checks in session flash and then in regular session otherwise return default
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {//stores a msg in flash array ,uses for temp msgs
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {//delete all the flash data from the session
       unset($_SESSION['_flash']);
    }

    public static function flush()
    {//clears everything in the session
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();//clear session array

        session_destroy();//kill the sesion
        //remove the session cookie
        $params = session_get_cookie_params();//changing the cookie value 
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        
    }
    
    
    public static function getFlash($key, $default = null)
    {//same as get but uses for flash messages
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function unset($key)
    {
        if (isset($_SESSION['_flash'][$key])) {
            unset($_SESSION['_flash'][$key]);
        }
        
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}