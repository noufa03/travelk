<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$status = ($_POST['status'] == "confirmed") ? "cancelled" : "confirmed";

$updatestatus = $db->query('UPDATE tablereservations SET "reservationstatus" = :status WHERE "reservationid" = :id', [
    'status' => $status,
    'id' => $_POST['id']
]);


header('location: /reservations?id=' . $userid);
die();
