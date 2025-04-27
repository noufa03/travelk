<?php

use Core\App;
use Core\Database;

// Resolve the database instance
$db = App::resolve(Database::class);

// Fetch the profile picture path for the logged-in user
$userEmail = $_SESSION['user']['email'] ?? null;

if (!$userEmail) {
    // Handle case where user is not logged in
    $profilePicture = '/assets/admins/areaadmins/profilepictures/default.jpg'; // Fallback image
    $displayEmail = 'Guest'; // Fallback email display
} else {
    // Query for the profile picture path
    $result = $db->query(
        'SELECT profile FROM areaadmins WHERE email = :email',
        ['email' => $userEmail]
    )->find(); // Use find() to get a single row

    // Set the profile picture path or use a default if not found
    $profilePicture = $result['profile'] ?? '/assets/admins/areaadmins/profilepictures/default.jpg';
    $displayEmail = $userEmail;
}

// Pass data to the view
view("areaadmin/header.view.php", [
    'profilePicture' => $profilePicture,
    'displayEmail' => $displayEmail
]);
