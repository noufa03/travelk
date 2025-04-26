<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Models\Restuarant_Table;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
//button clck if confimed it will cancleed and vice versa
$status = ($_POST['status'] == "confirmed") ? "cancelled" : "confirmed";

$updatestatus = $db->query('UPDATE tablereservations SET "reservationstatus" = :status WHERE "reservationid" = :id', [
    'status' => $status,
    'id' => $_POST['id']
]);
$msg = ($status == 'confirmed') ? 'You have confirmed the reservation .' : 'You have cancelled the reservation.';

//update the tb according ti the confirmed and cancelled msg
$tablestatus=($status=='confirmed')? 0 :1;
$updatetable=Restuarant_Table::n_updateTableAvailablility($_POST['tableid'],$tablestatus);
header('location: /reservations');
Session::flash('toast',$msg);
die();
