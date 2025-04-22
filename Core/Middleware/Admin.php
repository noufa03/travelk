<?php

namespace Core\Middleware;

class Admin
{
    public function handle()
    {
    
      
        if (isset($_SESSION['user']) && $_SESSION['user'] === 'admin') {
           
            if ($_SERVER['REQUEST_URI'] !== '/admin') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}