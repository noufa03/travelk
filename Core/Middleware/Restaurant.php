<?php

namespace Core\Middleware;

class Restaurant
{
    public function handle()
    {
    
      //if the user is not logged in or  not a restuarant cannot access restuarant pages will go to 403 page
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'restaurant')) {
           
              abort(403);
        
        } 
    
        
    }
}