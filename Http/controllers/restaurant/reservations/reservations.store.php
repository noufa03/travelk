<?php

use Core\App;
use Core\Validator;
use Core\Database;
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
    'category' => $_POST['category'],

    'reservationcode' => $_POST['reservationcode'] ?? [],
    'email(traveler)' => $_POST['email(traveler)'] ?? []

]);

$user = User::findByEmail($attributes['email(traveler)']);
if (!$user) {

    $form->error('email(traveler)', 'Email does not exist')
        ->throw();
}

$result = Restuarant_Table::n_findByCategory($userid, $_POST['category']);
$tableid = $result['tableid'] ?? null;

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



header('location: /reservations?id=' . $userid);
die();
