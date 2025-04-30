<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
$category=$_GET['category']??'';

if(($category) ){
$cuisines = $db->query('
SELECT 
    c."cuisineID",
    c."cuisine_name",
    c."cuisine_type",
    c."description",
    c."photo",
    c."resID",
    c."chef",
    AVG(cr."ratings") AS average_rating,
    c."available"   
  FROM cuisine c 
LEFT JOIN cuisine_review cr ON c."cuisineID" = cr."cuisineID"  
WHERE c."resID" = :id and c."cuisine_type"=:cat
GROUP BY c."cuisineID"
', [
    'id' => $userid,
    'cat'=>$category
])->get();




}
else{

$cuisines = $db->query('
SELECT 
    c."cuisineID",
    c."cuisine_name",
    c."cuisine_type",
    c."description",
    c."photo",
    c."resID",
     c."chef",
    AVG(cr."ratings") AS average_rating,
    c."available"
   FROM cuisine c 
LEFT JOIN cuisine_review cr ON c."cuisineID" = cr."cuisineID"  
WHERE c."resID" = :id
GROUP BY c."cuisineID"
', [
    'id' => $userid
])->get();





}




view("restaurant/Menus/index.view.php", [
    'heading' => ' Cuisine List',
    'cuisines' => $cuisines,
    'userid' => $userid,
   

]);
