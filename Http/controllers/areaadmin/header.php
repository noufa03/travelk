<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$userEmail = $_SESSION['user']['email'] ?? null;

if (!$userEmail) {

    $profilePicture = '/assets/admins/areaadmins/profilepictures/default.jpg'; 
    $displayEmail = 'Guest';
} else {

    $result = $db->query(
        'SELECT profile FROM areaadmins WHERE email = :email',
        ['email' => $userEmail]
    )->find(); 


    $profilePicture = $result['profile'] ?? '/assets/admins/areaadmins/profilepictures/default.jpg';
    $displayEmail = $userEmail;
}


view("areaadmin/header.view.php", [
    'profilePicture' => $profilePicture,
    'displayEmail' => $displayEmail
]);
