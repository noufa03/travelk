<?php

namespace Core\Middleware;

class AreaAdmin
{
    public function handle()
    {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (
            isset($_SESSION['area_admin']) &&
            $_SESSION['area_admin']['role'] === 'areaadmin'
        ) {
            // ✅ User is authorized, continue to route
            return;
        }

        // ❌ Unauthorized access
        abort(403);
    }
}