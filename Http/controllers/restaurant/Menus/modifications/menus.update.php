<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$cuisine = $db->query('select * from cuisine where "cuisineID" = :id', [
    'id' => $_GET['id']
])->findOrFail();


authorize($cuisine['resID'] === $userid);





if (!empty($_FILES['photo']['tmp_name'])) {
    $fileTmp = $_FILES['photo']['tmp_name']; 
    $filename = $_FILES['photo']['name'];
    $filenameCops = explode('.', $filename); 
    $fileExtension = end($filenameCops); 
    $newfilename = md5(time() . $filename); 
    $newfilename = $newfilename . "." . $fileExtension;
    $targetdir = base_path("/public/restaurants/folder$userid/menus/");
    $targetFile = $targetdir . $newfilename; 
    move_uploaded_file($fileTmp, $targetFile);
    $photo = 'restaurants/folder' . $userid . '/menus/' . $newfilename;
    unlink(base_path("/public/") . $_POST['photo']);

    $db->query('UPDATE cuisine 
    SET "cuisine_name" = :name, 
        "cuisine_type" = :type, 
        "description" = :des, 
    
        "photo" = :photo,  
         
        "available" = :available ,
        "chef"=:chef
        
    WHERE "cuisineID" = :id', [
        'id' => $_GET['id'],
        'name' => $_POST['cuisine_name'],
        'type' => $_POST['cuisine_type'],
        'des' => $_POST['description'],

        'photo' => $photo,

        'available' => ($_POST['available'] == 'yes') ? 1 : 0,
        'chef'=>$_POST['chef']
    ]);


    header('location: /mymenus');
    die();
}


$photo = $_POST['photo'];
$db->query('UPDATE cuisine 
    SET "cuisine_name" = :name, 
        "cuisine_type" = :type, 
        "description" = :des, 
    
        "photo" = :photo,  
         
        "available" = :available,
        "chef"=:chef
        
    WHERE "cuisineID" = :id', [
    'id' => $_GET['id'],
    'name' => $_POST['cuisine_name'],
    'type' => $_POST['cuisine_type'],
    'des' => $_POST['description'],

    'photo' => $photo,

    'available' => ($_POST['available'] == 'yes') ? 1 : 0,
    'chef'=>$_POST['chef']
]);



header('location: /mymenus');

Session::flash('toast', 'Cuisine Updated successfully');
die();
