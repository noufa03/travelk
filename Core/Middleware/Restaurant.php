<?php

namespace Core\Middleware;

class Restaurant
{
    public function handle()
    {
    
      
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'restaurant') {
           
            if ($_SERVER['REQUEST_URI'] !== '/dashboard_rest') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}