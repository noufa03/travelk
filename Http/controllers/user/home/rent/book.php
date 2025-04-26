<?php
// dd($_POST);
use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$customername=$db->query('select "user_name" from travelers where "traid"=:id',[
    'id'=>$userid

])->find();
$customername=$customername['user_name'];

$rentaldurationto = isset($_POST['rentaldurationto']) ? floatval($_POST['rentaldurationto']) : 0;
$rentaldurationfrom = isset($_POST['rentaldurationfrom']) ? floatval($_POST['rentaldurationfrom']) : 0;

$rentalduration = $rentaldurationto - $rentaldurationfrom;

$totalcost=$_POST['rateperhour']*$rentalduration;
$pickuptime = $_POST['rentaldurationfrom'] . ':00'; 

// dd($_POST);

$book = $db->query('INSERT INTO vehiclebooking(
    "customername", "contactnumber", "emailaddress", "carid", 
    "pickupdate", "pickuplocation", "dropofflocation", 
    "rentalduration", "paymentstatus", "paymentmethod", "totalcost", 
    "ridecompleted", "confirmation_of_driver", "pickuptime", "rating"
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
    $customername,
    $_POST['contactnumber'],
    $user['email'],
    $_POST['vehicleid'],
    $_POST['pickupdate'],
    // $_POST['dropoffdate'],
    $_POST['pickuplocation'],
    $_POST['dropofflocation'],
    $rentalduration,
    'pending',
    $_POST['paymentmethod'],
    $totalcost,
    'false',
    'false',
    $pickuptime, 
    0
]);

//book the  vehicle 
$bookvehicle=$db->query('UPDATE vehicle_details SET "status"=:status WHERE "id"=:id',[
    'status'=>0,
    'id'=>$_POST['vehicleid']

]);
//book the driver
$bookdriver=$db->query('UPDATE drivers SET "status"=:status WHERE "driverid"=:id',[
    'id'=>$_POST['driverid'],
    'status'=>0

]);


header('location: /book/rental/details');
// Session::flash('toast', 'Your issue has been successfully reported. Thank you for your feedback.');
die();

