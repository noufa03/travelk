<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddMenu;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = AddMenu::validate($attributes = [
    'cuisine_name' => $_POST['cuisine_name'] ?? '',
    'cuisine_type' => $_POST['cuisine_type'] ?? '',
    'description' => $_POST['description'] ?? '',
    'photo' => $_FILES['photo'] ?? '',
    'chef'=>$_POST['chef']??''
]);




$fileTmp = $_FILES['photo']['tmp_name']; 
$filename = $_FILES['photo']['name'];
$filenameCops = explode('.', $filename);
$fileExtension = end($filenameCops); 
$newfilename = md5(time() . $filename);
$newfilename = $newfilename . "." . $fileExtension;
$targetdir = base_path("/public/restaurants/folder$userid/menus/");
$targetFile = $targetdir . $newfilename; 
move_uploaded_file($fileTmp, $targetFile);

$cuisine = $db->query('INSERT INTO cuisine("resID","cuisine_name","cuisine_type","description","photo","chef") VALUES(:id, :name,:type,:des,:photo,:chef)', [
    'id' => $userid,
    'name' => $_POST['cuisine_name'],
    'type' => $_POST['cuisine_type'],
    'des' => $_POST['description'],
    'photo' => "restaurants/folder$userid/menus/$newfilename",
    'chef'=>$attributes['chef']

]);

header('location: /mymenus');
Session::flash('toast', 'Cuisine added successfully');
die();
