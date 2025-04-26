<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddMenu;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
$size=$_POST['size_name'];

// $form = AddSizes:validate($attributes = [
//     'names' => $_POST['names'] ?? '',
//     'sizes' => $_POST['sizes'] ?? [],
//     'prices' => $_POST['prices'] ?? []

// ]);

// $sizes = $attributes['sizes'];



    $cuisinesize = $db->query('INSERT INTO cuisinesizes("cuisineID", "size", "price") VALUES (:cid, :size, :price)', [
        'cid' => $_POST['id'],
        'size' => $size,
        'price' => $_POST['price']
    ]);




header('location: /menu/add/size?id='.$_POST['id']);
Session::flash('toast', ' New Custom size added successfully');
die();
