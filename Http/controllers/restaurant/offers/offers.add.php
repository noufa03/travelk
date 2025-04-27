<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisines = $db->query('select cuisine_name from cuisine where "resID"=:id', [
    'id' => $userid
])->get();

$cuisines = array_column($cuisines, 'cuisine_name');//multi dimensional array into single col

view("restaurant/offers/offers.add.view.php", [
    'heading' => 'Add Offers',
    'cuisines' => $cuisines,
    'errors'=>Session::get('errors')
]);
