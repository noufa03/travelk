<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];
// $errors = [];

// if (! Validator::string($_POST['body'], 1, 1000)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }


// if (! empty($errors)) {
//     return view("restaurant/offers/offers.add.view.php", [
//         'heading' => 'Add Offers',
//         'errors' => $errors
//     ]);
// }


$cuisine_name=$_POST['cuisine_name'];

$cid=$db->query('select "cuisineID" from cuisine where "cuisine_name"=:name',[
 'name'=>$cuisine_name
])->find();
$cid=$cid['cuisineID'];

$dailyoffers=$db->query('INSERT INTO dailyoffers("offer_title", "offer_description","start_time","end_time","discount_percentage","cuisineID","resID") VALUES(:title, :offer_des,:s_time,:e_time,:discount,:cid,:rid)', [
        'title'=>$_POST['offer_title'],
        'offer_des'=>isset($_POST['offer_description'])?$_POST['offer_description']:'Nothing',
        's_time'=>$_POST['start_time'],
        'e_time'=>$_POST['end_time'],
        'discount'=>isset($_POST['discount_percentage'])?$_POST['discount_percentage']:null,
        'cid'=>isset($cuisine_name)? $cid:NULL,
        'rid'=>$userid
        
        
           
        ]);


header('location: /myoffers');
die();




       
        

