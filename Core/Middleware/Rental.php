<?php

namespace Core\Middleware;

class Rental
{
    public function handle()
    {
    
      
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'driver') {
           
            if ($_SERVER['REQUEST_URI'] !== '/dashboard_rental') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}