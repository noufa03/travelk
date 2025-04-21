<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Http\Forms\AddMenu;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = AddMenu::validate($attributes = [
    'cuisine_name' => $_POST['cuisine_name'] ?? '',
    'cuisine_type' => $_POST['cuisine_type'] ?? '',
    'description' => $_POST['description'] ?? '',
    'photo' => $_FILES['photo'] ?? '',
    'sizes' => $_POST['sizes'] ?? [],
    'prices' => $_POST['prices'] ?? []

]);

$sizes = $attributes['sizes'];

$fileTmp = $_FILES['photo']['tmp_name']; //old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename = $_FILES['photo']['name'];
$filenameCops = explode('.', $filename); //explode the file name
$fileExtension = end($filenameCops); //extension eka gaththa

$newfilename = md5(time() . $filename); //make a new file name
$newfilename = $newfilename . "." . $fileExtension;

$targetdir = base_path("/public/restaurants/folder$userid/menus/");
$targetFile = $targetdir . $newfilename; //new path
move_uploaded_file($fileTmp, $targetFile);

$cuisine = $db->query('INSERT INTO cuisine("resID","cuisine_name","cuisine_type","description","photo") VALUES(:id, :name,:type,:des,:photo)', [
    'id' => $userid,
    'name' => $_POST['cuisine_name'],
    'type' => $_POST['cuisine_type'],
    'des' => $_POST['description'],
    'photo' => "restaurants/folder$userid/menus/$newfilename"

]);
$lastInsertedId = $db->connection->lastInsertId();
foreach ($sizes as $size) {
    $cuisinesize = $db->query('INSERT INTO cuisinesizes("cuisineID", "size", "price") VALUES (:cid, :size, :price)', [
        'cid' => $lastInsertedId,
        'size' => $size,
        'price' => $attributes['prices'][$size]
    ]);
}

header('location: /mymenus');
die();
