<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
//current logged in email(from session)
$userEmail = $_SESSION['user']['email'];
//userID from email(from users Table)
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail'=>$userEmail])->find();
//userID availability check
if(!$userID){
    $hotel = null;
}else{
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID",['userID' => $userID['userid']])->find();
}
//if userid not found, redirect to dashboard
if(!$hotel){
    header("Location : /dashboard_hotel");
    exit();
}
$accID = $hotel['accid'];

//form submission
if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = [
        'accid' => $accID,
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'features' => $_POST['features'],
        'location' => $_POST['location'],
        'price' => $_POST['price'],
        'availability' => isset($_POST['availability']) ? 1 : 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    //insert above from FORM to DB
    $db->query("INSERT INTO accommodation_listings (
        accid, name, category, features, location, price, availability, created_at, updated_at
    ) VALUES (
        :accid, :name, :category, :features, :location, :price, :availability, :created_at, :updated_at
    )", $data);
    
    
    //redirect after successful 
    header("Location: /listing_hotel");
    exit();
}


view('hotel/listing/listing.add.view.php',[
    'hotel' => $hotel
]);


