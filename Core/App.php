<?php

namespace Core;

class App
{
    protected static $container;//it has a static property container ,which holde the container instance

    public static function setContainer($container)
    {//container saves in the app
        static::$container = $container;
    }

    public static function container()
    {//returns the current container instance
        return static::$container;
    }

    public static function bind($key, $resolver)
    {//key-> phpmailer,or a user service,resolver-> classname to resolve the dependency
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {//retrieve a bound service
        return static::container()->resolve($key);
    }
}
