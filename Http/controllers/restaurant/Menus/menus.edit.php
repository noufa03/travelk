<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

$cuisine = $db->query('select * from cuisine where "cuisineID" = :id', [
    'id' => $_GET['id']
])->findOrFail();



$cuisinesize_small=$db->query('select * from cuisinesizes where "cuisineID"=:id and "size"=:size ',[
'id'=>$_GET['id'],
'size'=>'small'


])->find();
// dd($cuisinesize_small['price']);
$cuisinesize_small_size=isset($cuisinesize_small['size'])??'No set';
$cuisinesize_small_price=isset($cuisinesize_small['price'])? $cuisinesize_small['price']:0.00;

$cuisinesize_medium=$db->query('select * from cuisinesizes where "cuisineID"=:id and "size"=:size ',[
'id'=>$_GET['id'],
'size'=>'medium'


])->find();
$cuisinesize_medium_size=isset($cuisinesize_medium['size'])??'No set';

$cuisinesize_medium_price=isset($cuisinesize_medium['price'])? $cuisinesize_medium['price']:0.00;


$cuisinesize_large=$db->query('select * from cuisinesizes where "cuisineID"=:id and "size"=:size ',[
'id'=>$_GET['id'],
'size'=>'large'


])->find();
$cuisinesize_large_size=isset($cuisinesize_large['size'])??'No set';

$cuisinesize_large_price=isset($cuisinesize_large['price'])? $cuisinesize_large['price']:0.00;



authorize($cuisine['resID'] === $userid);

view("restaurant/Menus/menus.edit.view.php", [
    'heading' => 'Edit cuisine',
    'errors' => [],
    'cuisine' => $cuisine,
    'userid'=>$userid,
    'cuisinesize_small_size'=>$cuisinesize_small_size,
    'cuisinesize_small_price'=>$cuisinesize_small_price,
    'cuisinesize_medium_size'=>$cuisinesize_medium_size,
    'cuisinesize_medium_price'=>$cuisinesize_medium_price,
     'cuisinesize_large_size'=>$cuisinesize_large_size,
    'cuisinesize_large_price'=>$cuisinesize_large_price,
]);