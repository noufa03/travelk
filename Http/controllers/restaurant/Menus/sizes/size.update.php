<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

;
$cuisinesize = $db->query('select * from cuisinesizes where "sizeID" = :id', [
    'id' => $_POST['id']
])->findOrFail();


$db->query('UPDATE cuisinesizes 
    SET "size" = :name, 
        "price" = :price
  WHERE "sizeID" = :id', [
    'id' => $cuisinesize['sizeID'],
    'name' => $_POST['size_name'],
    'price' => $_POST['price']

]);




// redirect the user4

header('location: /menu/add/size?id='.$cuisinesize['cuisineID']);

Session::flash('toast', 'Size Updated successfully');
die();
