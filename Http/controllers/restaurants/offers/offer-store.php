<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisine_name = $_POST['cuisine_name'];

$cid = $db->query('select "cuisineID" from cuisine where "cuisine_name"=:name', [
        'name' => $cuisine_name
])->find();
$cid = $cid['cuisineID'];

$dailyoffers = $db->query('INSERT INTO dailyoffers("offer_title", "offer_description","start_time","end_time","discount_percentage","cuisineID","resID") VALUES(:title, :offer_des,:s_time,:e_time,:discount,:cid,:rid)', [
        'title' => $_POST['offer_title'],
        'offer_des' => isset($_POST['offer_description']) ? $_POST['offer_description'] : 'Nothing',
        's_time' => $_POST['start_time'],
        'e_time' => $_POST['end_time'],
        'discount' => isset($_POST['discount_percentage']) ? $_POST['discount_percentage'] : null,
        'cid' => isset($cuisine_name) ? $cid : NULL,
        'rid' => $userid



]);

$expiry=$db->query('INSERT INTO notifications (userid, message, type, is_read, created_at, expires_at) VALUES (:resID,:msg,:type,:read,:starttime,:endtime)',[
        'resID'=> $userid,
        'msg'=>'Your offer has expired,remove'.$cuisine_name,
        'type'=>'info',
        'read'=>'false',
        'starttime'=>$_POST['start_time'],
        'endtime'=>$_POST['end_time']

]);



header('location: /myoffers');
Session::flash('toast', 'The offer has been successfully added and is now available.');

die();
