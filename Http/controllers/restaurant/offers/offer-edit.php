<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

$offers = $db->query('select * from dailyoffers where "offer_id" = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($offers['resID'] === $userid);

$cid=$db->query('select "cuisineID" from dailyoffers where offer_id=:id',[
'id' => $_GET['id']
])->find();
$cid=$cid['cuisineID'];

$cuisine_name=$db->query('select "cuisine_name" from cuisine where "cuisineID"=:cid',[
'cid'=>$cid
])->find();

$cuisine_name=$cuisine_name['cuisine_name'];

$cuisines=$db->query('Select "cuisine_name","cuisineID" from cuisine where "resID"=:id',[
    'id'=>$userid
    ])->find();


view("restaurant/offers/offer-edit.view.php", [
    'heading' => 'Edit Offer',
    'errors' => [],
    'offers' => $offers,
    'cuisine_name'=>$cuisine_name,
    'cuisines'=>$cuisines
]);