<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddMenu;
use Http\Forms\AddSizes;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
$size=$_POST['size_name'];


$form = AddSizes::validate($attributes = [
 
    'size_name' => $_POST['size_name'] ?? [],
    'price' => $_POST['price'] ?? []

]);




$cuisinesize = $db->query('INSERT INTO cuisinesizes("cuisineID", "size", "price") VALUES (:cid, :size, :price)', [
        'cid' => $_POST['id'],
        'size' => $attributes['size_name'],
        'price' => $attributes['price']
    ]);




header('location: /menu/add/size?id='.$_POST['id']);
Session::flash('toast', ' New Custom size added successfully');
die();
