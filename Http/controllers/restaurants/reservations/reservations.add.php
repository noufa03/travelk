<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$available_tables = $db->query(
    'SELECT * FROM restaurant_table where "resID"=:id and "status"=:status',
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
