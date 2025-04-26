<?php

namespace Core\Middleware;
//rental middleware class
class Rental
{
    public function handle()
    {
    
      //if the user is not  logged in and not a  driver ,cannot access drivers pages will go to 403pg
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'driver')) {
           
             abort(403);//use the abort function in functions.php and use 403,that returns the http_response_code
         
        
        } 
    
        
    }
}