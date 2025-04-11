<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];
$errors = [];
// dd($_POST);

// if (! Validator::string($_POST['description'], 1, 1000)) {
//     $errors['description'] = 'A body of no more than 1,000 characters is required.';
// }

// if(!Validator::smallerThan($_POST['price'],1000)){

//     $errors['price'] = 'price is too small.';
// }

if (! empty($errors)) {
    return view("restaurant/table/tables.add.view.php", [
    
        'errors' => $errors,
        'userid'=>$userid
    ]);
}

$result = $db->query(
    'select "tableid" from restaurant_table where "category"=:cat and "resID"=:id',
    [
        'id' => $userid,
        'cat' => $_POST['category']
    ]
)->find();

$tableid = $result['tableid'] ?? null; // use null if not found


$traid=$db->query('select "userid" from users where "email"=:email and "role"=:role',[
'email'=> $_POST['email(traveler)'],
'role'=>'traveler'
])->find();

$reservationcode = 'RES' . str_pad(rand(0, 999), 5, '0', STR_PAD_LEFT);


$table = $db->query(
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



header('location: /tables');
die();
