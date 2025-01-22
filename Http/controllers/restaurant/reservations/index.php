<?php



use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];

$reservations = $db->query('select * from table_bookings where "resID" =:resID ',[
'resID'=>$userid

])->get();

view("restaurant/reservations/index.view.php", [
    'heading' => 'My Reservations',
    'reservations' => $reservations
]);