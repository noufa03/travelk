<?php

namespace Core\Middleware;

class Admin
{
    public function handle()
    {
    
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (
            isset($_SESSION['user']) &&
            $_SESSION['user']['role'] === 'admin'
        ) {
            // ✅ User is authorized, continue to route
            return;
        }

        // ❌ Unauthorized access
        abort(403);
    }
}