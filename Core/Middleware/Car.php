<?php

namespace Core\Middleware;

class Car
{
    public function handle()
    {
    
      
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'driver') {
           
            if ($_SERVER['REQUEST_URI'] !== '/dashboard_car') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}