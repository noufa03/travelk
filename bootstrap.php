<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\Mail;

//will make a container instance
$container = new Container();



$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});


$container->bind('Core\Mail', function () {
    $config = require base_path('config.php');

    return new Mail($config['mail']);
});

App::setContainer($container);

