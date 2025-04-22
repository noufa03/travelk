<?php

namespace Core\Middleware;

class AreaAdmin
{
    public function handle()
    {
    
      
        if (isset($_SESSION['area_admin']) && $_SESSION['area_admin']['role'] === 'areaadmin') {
           
            if ($_SERVER['REQUEST_URI'] !== '/areaadmin') {
              
            }
        
        } else{
               abort(403);
        
        }
    
        
    }
}