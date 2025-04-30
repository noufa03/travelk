<?php

namespace Core\Middleware;

class Restaurant
{
    public function handle()
    {
    
      
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'restaurant')) {
           
              abort(403);
        
        } 
    
        
    }
}