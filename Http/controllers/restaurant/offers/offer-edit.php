<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$offers = $db->query('select * from dailyoffers where "offer_id"=:id ', [
    'id' => $_GET['id']
])->find();

$cid = $offers['cuisineID'];
// all the cuisines
$cuisines = $db->query('select * from cuisine where "resID"=:id', [
    'id' => $userid
])->get();

//cuisine name one
$cuisine_one = $db->query('select * from cuisine where "cuisineID"=:id', [
    'id' => $cid
])->find();

view("restaurant/offers/offer-edit.view.php", [
    'heading' => 'Edit Offer',
    'errors' => [],
    'offers' => $offers,
    'cuisines' => $cuisines,
    'cuisine_one' => $cuisine_one


]);
