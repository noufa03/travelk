<?php



use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];

$reservations = $db->query('
    SELECT * 
    FROM tablereservations tb
    JOIN restaurant_table rt ON tb."tableid" = rt."tableid"
    JOIN travelers tr ON tb."traid" = tr."traid"
    
    WHERE rt."resID" = :id
', [
    'id' => $userid
])->get();


// dd($reservations);

view("restaurant/reservations/index.view.php", [
    'heading' => 'My Reservations',
    'reservations' => $reservations
]);