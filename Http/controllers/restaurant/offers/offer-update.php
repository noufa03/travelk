<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$offers = $db->query('select * from dailyoffers where "offer_id" = :id', [
    'id' => $_GET['id']
])->find();

authorize($offers['resID'] === $userid);


$errors = [];



if (count($errors)) {
    return view('restaurant/offers/offer-edit.view.php', [
        'heading' => 'Edit Offer',
        'errors' => $errors,
        'offers' => $offers
    ]);
}

$cid = $db->query('select "cuisineID" from cuisine where "cuisine_name"=:name', [
    'name' => $_POST['cuisine_name'] 

])->find();

$cid = isset($cid['cuisineID']) ? $cid['cuisineID'] : null;

$db->query('UPDATE dailyoffers 
    SET "offer_title" = :title, 
    
        "offer_description" = :des, 
    
        "start_time" = :stime,  
        "end_time" = :etime,  
         "discount_percentage"=:discount,
         "cuisineID"=:cid,
         "resID"=:rid,
         "is_active"=:active
             WHERE "offer_id" = :id', [
    'id' => $_GET['id'],
    'title' => $_POST['offer_title'],

    'des' => $_POST['offer_description'],
    'stime' => $_POST['start_time'],
    'etime' => $_POST['end_time'],
    'discount' => $_POST['discount_percentage'],
    'cid' => $cid,
    'rid' => $userid,
    'active' => isset($_POST['is_active']) ? $_POST['is_active'] : 'true'



]);

header('location: /myoffers');

Session::flash('toast', 'The offer has been successfully updated and is now available.');

die();
