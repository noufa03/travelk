<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddReservations;
use Models\Restuarant_Table;
use Models\User;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = AddReservations::validate($attributes = [
    'reservation_date' => $_POST['reservation_date'] ?? '',
    'reservationstatus' => $_POST['reservationstatus'] ?? '',
    'specialrequests' => $_POST['specialrequests'] ?? '',
    'tablename' => $_POST['tablename'],
    'reservationcode' => $_POST['reservationcode'] ?? [],
    'email(traveler)' => $_POST['email(traveler)'] ?? []

]);

$user = User::findByEmail($attributes['email(traveler)']);
if (!$user) {

    $form->error('email(traveler)', 'Email does not exist')
        ->throw();
}


$result = Restuarant_Table::n_findByName($userid,$attributes['tablename']);

$tableid = $result['tableid'] ?? null;
$is_available=Restuarant_Table::n_tableAvailability($tableid);


if(!$is_available){

  $form->error('tablename', 'Table is already booked')
    ->throw();

}
if (strtotime($attributes['reservation_date']) < time()) {
    $form->error('reservation_date', 'Invalid reservation date')
         ->throw();
}

$traid = User::n_findTraid($_POST['email(traveler)']);
$traid = $traid['userid'];

$reservationcode = 'RES' . str_pad(rand(0, 999), 5, '0', STR_PAD_LEFT);
$reservation = $db->query(
    'INSERT INTO tablereservations(
        "tableid", "traid", "reservation_date", "reservationstatus", 
        "specialrequests", "reservationcode", "email(traveler)"
    ) VALUES (
        :id, :traid, :date, :status, :sp, :code, :email
    )',
    [
        'id'     => $tableid,
        'traid'  => $traid,
        'date'   => $_POST['reservation_date'],
        'status' => 'confirmed',
        'sp'     => $_POST['specialrequests'],
        'code'   => $reservationcode,
        'email'  => $_POST['email(traveler)']
    ]
);
$status=0;

$updatetable=Restuarant_Table::n_updateTableAvailablility($tableid,$status);


header('location: /reservations');
Session::flash('toast', 'Reservation added successfully. Give the reservation code to the customer. Code is: ' . $reservationcode);
die();