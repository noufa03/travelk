<?php

use Core\App;
use Core\Database;
use Core\Middleware\Restaurant;
use Core\Session;
use Http\Forms\ResetPassword;
use Models\Restuarant;
use Models\User;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];
$file = $_FILES['profile'];



$targetDir = base_path('public/restaurants/folder' . $userid . '/profile');


$fileTmpPath = $file['tmp_name'];
$fileName = $file['name'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));


$newFileName = md5(time() . $fileName) . '.' . $fileExtension;

$targetFile = $targetDir . $newFileName;


$existingImg = Restuarant::n_findProfileByResID($userid);


if ($existingImg) {
    $existingFilePath = base_path("/public/") . $existingImg['profile'];
    if (file_exists($existingFilePath)) {
        unlink($existingFilePath);
    }
}


if (move_uploaded_file($fileTmpPath, $targetFile)) {
    $db->query('UPDATE restaurant_details SET profile = ? WHERE id = ?', ['restaurants/folder' . $userid . '/profile' . $newFileName, $userid]);
    $user = authUser();
}




redirect('/details_rest/edit');
