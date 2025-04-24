<?php

namespace Core\Middleware;

class AreaAdmin
{
    public function handle()
    {
    
      
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'areaadmin') {
           
            if ($_SERVER['REQUEST_URI'] !== '/areaadmin') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}