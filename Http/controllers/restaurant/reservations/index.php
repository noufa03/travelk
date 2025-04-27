<?php

use Core\App;
use Core\Database;
use Models\Restuarant_Reservations;
use Models\Restuarant_Table;

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
    'id' => $userid,

  ])->get();


  $now = time();



  foreach ($reservations as $reservation) {
    $reservationDate = strtotime($reservation['reservation_date']);

    if ($reservationDate < $now) {
         $updatetable = Restuarant_Table::n_updateTableAvailablility($reservation['tableid'], 1);
         $updatereservation = Restuarant_Reservations::n_reservationComplete($reservation['reservationid']);
    }
  }








view("restaurant/reservations/index.view.php", [

  'heading' => 'My Reservations',
  'reservations' => $reservations,
  'userid' => $userid,

]);
