<?php

namespace Core\Middleware;

class Traveler
{
    public function handle()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'traveler') {
           
            if ($_SERVER['REQUEST_URI'] !== '/') {              
            }
        
        } else{
            abort(403);
        } 
    }
}