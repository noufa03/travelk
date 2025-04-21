<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisines = $db->query('
SELECT 
    c."cuisineID",
    c."cuisine_name",
    c."cuisine_type",
    c."description",
    c."photo",
    c."resID",
   
    ARRAY(
        SELECT DISTINCT r FROM UNNEST(ARRAY_AGG(cr."ratings")) AS r
    ) AS ratings,
    ARRAY(
        SELECT DISTINCT r FROM UNNEST(ARRAY_AGG(cr."reviewid")) AS r
    ) AS reviewid,
    AVG(cr."ratings") AS average_rating,
    c."available",
    ARRAY(
        SELECT DISTINCT s FROM UNNEST(ARRAY_AGG(cs."size")) AS s
    ) AS sizes,
    ARRAY(
        SELECT DISTINCT p FROM UNNEST(ARRAY_AGG(cs."price")) AS p
    ) AS prices,
    MAX(cs."price") FILTER (WHERE cs."size" = \'small\') AS small_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'medium\') AS medium_price,
    MAX(cs."price") FILTER (WHERE cs."size" = \'large\') AS large_price
FROM cuisine c 
JOIN cuisinesizes cs ON c."cuisineID" = cs."cuisineID"
LEFT JOIN cuisine_review cr ON c."cuisineID" = cr."cuisineID"  
WHERE c."resID" = :id
GROUP BY c."cuisineID"
', [
    'id' => $userid
])->get();

authorize($cuisines[0]['resID'] === $userid, Response::FORBIDDEN);

view("restaurant/Menus/category.view.php", [
    'heading' => 'Categories',
    'cuisines' => $cuisines,
    'userid' => $userid,
]);
