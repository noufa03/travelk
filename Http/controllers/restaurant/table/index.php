<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$reservations = $db->query('
    SELECT * 
    FROM tablereservations tb
    JOIN restaurant_table rt ON tb."tableid" = rt."tableid"
    JOIN travelers tr ON tb."traid" = tr."traid"
    
    WHERE rt."resID" = :id
', [
    'id' => $userid
])->get();

$currentDate = new DateTime();
$currentDate = $currentDate->format("Y-m-d H:i:s");

if (!empty($reservations)) {
    foreach ($reservations as $reservation) {
        if ($reservation['reservationstatus'] == 'confirmed') {

            $db->query('UPDATE restaurant_table SET "status" = :status WHERE "tableid" = :id', [
                'id' => $reservation['tableid'],
                'status' => 0
            ]);
        }


        if ($reservation['reservationstatus'] == 'cancelled' || $reservation['reservationstatus'] == 'pending' || (new DateTime($reservation['reservation_date']))->format("Y-m-d H:i:s") < $currentDate) {
            $db->query('UPDATE restaurant_table SET "status" = :status WHERE "tableid" = :id', [
                'id' => $reservation['tableid'],
                'status' => 1
            ]);
        }
    }

    $tables = $db->query('SELECT * FROM restaurant_table WHERE "resID" = :id', [
        'id' => $userid
    ])->get();
} else {
    $db->query('UPDATE restaurant_table SET "status" = :status', [

        'status' => 1
    ]);

    $tables = $db->query('SELECT * FROM restaurant_table WHERE "resID" = :id', [
        'id' => $userid
    ])->get();
}

view("restaurant/table/index.view.php", [
    'heading' => 'Tables',
    'tables' => $tables,
    'reservations' => $reservations

]);
