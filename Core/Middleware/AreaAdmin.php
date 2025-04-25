<?php

namespace Core\Middleware;

class AreaAdmin
{
    public function handle()
    {


        if (
            isset($_SESSION['user']) &&
            $_SESSION['user']['role'] === 'areaadmin'
        ) {
            // ✅ User is authorized, continue to route
            return;
        }

        // ❌ Unauthorized access
        abort(403);
    }
}