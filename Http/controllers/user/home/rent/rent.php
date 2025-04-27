<?php

use Core\App;
use Core\Database;

$db=App::resolve(Database::class);
if (isset($_SESSION['user'])) {
    $user = authUser();
}
$userid = isset($user)?$user['userid']:NULL;
$allcars = $db->query('SELECT vd.*, d.* FROM vehicle_details vd LEFT JOIN drivers d ON vd."driverid" = d."driverid"')->get();

view("user/home/rent.view.php", [
'allcars'=>$allcars,
'userid'=>$userid

]);
