<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 23;

$offers = $db->query('select * from dailyoffers where offer_id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($offers['resID'] === $currentUserId);

$cid=$db->query('select cuisineID from dailyoffers where offer_id=:id',[
'id' => $_GET['id']
])->get();
$cid=$cid[0]['cuisineID'];
$cuisine_name=$db->query("select cuisine_name from cuisine where cuisineID=:cid",[
'cid'=>$cid
])->get();

$cuisine_name=$cuisine_name[0]['cuisine_name'];

$cuisines=$db->query("Select cuisine_name,cuisineID from cuisine where resID=:resID",[
    'resID'=>23
    ])->get();


view("restaurant/offers/offer-edit.view.php", [
    'heading' => 'Edit Offer',
    'errors' => [],
    'offers' => $offers,
    'cuisine_name'=>$cuisine_name,
    'cuisines'=>$cuisines
]);