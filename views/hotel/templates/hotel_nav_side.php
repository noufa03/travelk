<?php
    if (!defined('BASE_PATH')) {
        define('BASE_PATH', __DIR__ . '/../');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="/public/images/logo.png" alt="Hotel Logo" class="logo">
                <h2>Hotel Name</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="/hotel/dashboard">Dashboard</a></li>
                    <li><a href="/hotel/accommodation">Accommodation</a></li>
                    <li><a href="/hotel/dining">Dining</a></li>
                    <li><a href="/hotel/services">Other Services</a></li>
                    <li><a href="/hotel/reports">Reports</a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/logout">Log Out</a></li>
                </ul>
            </nav>

            <!-- Dynamic Content -->
            <div class="content">
                <?php require_once(BASE_PATH . 'views/' . $view . '.view.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>
