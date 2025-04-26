<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
        //session have a user go to home page else donot
            header('location: /');
            exit();
        }
    }
}