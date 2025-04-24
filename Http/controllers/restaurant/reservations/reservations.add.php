<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$available_tables = $db->query(
    'SELECT DISTINCT ON ("category") * 
     FROM restaurant_table 
     WHERE "resID" = :id AND "status" = :status 
     ORDER BY "category", "tableid"',
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
