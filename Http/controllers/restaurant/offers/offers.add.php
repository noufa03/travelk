<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$id=23;


$cuisines=$db->query("Select cuisine_name,cuisineID from cuisine where resID=:resID",[
    'resID'=>23
    ])->get();





view("restaurant/offers/offers.add.view.php", [
    'heading' => 'Add Offers',
    'id'=>$id,
    'cuisines'=>$cuisines
]);

