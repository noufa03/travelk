<?php

//part of namespace core\middleware
namespace Core\Middleware;
//a middleware class named authenticated(checks whether the user is authenticated or not,not authenticated go to the home page)
class Authenticated
{
    public function handle()
    {
        if (! $_SESSION['user'] ?? false) {
        // seesion have a user so do not redirect to the homepage goes to the dashboard or something,but if they is no such user go to the home pg
            header('location: /');
            exit();
        }
    }
}