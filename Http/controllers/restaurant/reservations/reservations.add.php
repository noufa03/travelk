<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//available tables status is 1
$available_tables = $db->query(

    'SELECT * 
     FROM restaurant_table 
     WHERE "resID" = :id AND "status" = :status',

    [
        'id' => $userid,
        'status' => 1
    ]
)->get();


view("restaurant/reservations/reservations.add.view.php", [
    'heading' => 'Add Resevations',
    'userid' => $userid,
    'available_tables' => $available_tables,
    'errors' => Session::get('errors')

]);
