<?php

namespace Core\Middleware;

class Rental
{
    public function handle()
    {
    
   
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'driver')) {
           
             abort(403);
         
        
        } 
    
        
    }
}