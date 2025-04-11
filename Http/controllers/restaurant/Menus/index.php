<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];


$cuisines = $db->query('
SELECT 
    c."cuisineID",
    c."cuisine_name",
    c."cuisine_type",
    c."description",
    c."photo",
    c."resID",
    cr."review",
    cr."ratings",
    cr."reply",
    c."available",
    ARRAY_AGG(cs."size") AS sizes,
    ARRAY_AGG(cs."price") AS prices,
    MAX(cs."price") FILTER (WHERE cs."size" = \'small\') AS small_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'medium\') AS medium_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'large\') AS large_price
FROM cuisine c 
JOIN cuisinesizes cs ON c."cuisineID" = cs."cuisineID"
LEFT JOIN cuisine_review cr ON c."cuisineID" = cr."cuisineID"  
WHERE c."resID" = :id
GROUP BY c."cuisineID", cr."review", cr."ratings", cr."reply"  
', [
    'id' => $userid
])->get();
// dd($cuisines);

view("restaurant/Menus/index.view.php", [
    'heading' => ' Menu List',
    'cuisines' => $cuisines,
    'userid'=>$userid,
    
]);