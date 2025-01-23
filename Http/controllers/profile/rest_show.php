<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$profile = $db->query('select * from restaurants where resID=1')->findOrFail();
//have issue here
$size_of_img=$db->query('SELECT ROUND(LENGTH(logo) / (1024 * 1024), 2) AS image_size_in_mb
FROM restaurants
WHERE resID = 1;'
)->findOrFail();

//download 
$download=$db->query("select logo from restaurants where resID=1")->findOrFail();
$download=$download['logo'];

$download=file_put_contents("/public/downloads".'/'.$download, $download);


authorize($profile['resID'] === $currentUserId);

view("profile/rest_show.view.php", [
    'heading' => 'Profile',
    'profile' => $profile,
    'size_of_img'=>$size_of_img,
    'download'=>$download,
]);
