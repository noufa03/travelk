<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];

// $cuisines = $db->query('select * from cuisine where "resID" = :resID',[
// 'resID'=>$userid

// ])->get();


$cuisines = $db->query('
SELECT 
    c."cuisineID",
    c."cuisine_name",
    c."cuisine_type",
    c."description",
    c."photo",
    c."resID",
    c."review",
    c."ratings",
    c."reply",
    c."available",
    ARRAY_AGG(cs."size") AS sizes,
    ARRAY_AGG(cs."price") AS prices,
    MAX(cs."price") FILTER (WHERE cs."size" = \'small\') AS small_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'medium\') AS medium_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'large\') AS large_price
FROM cuisine c 
JOIN cuisinesizes cs ON c."cuisineID" = cs."cuisineID"
WHERE c."resID" = :id
GROUP BY c."cuisineID"
', [
    'id' => $userid
])->get();




view("restaurant/Menus/category.view.php", [
    'heading' => 'Categories',
    'cuisines' => $cuisines,
    'userid'=>$userid,
 
]);