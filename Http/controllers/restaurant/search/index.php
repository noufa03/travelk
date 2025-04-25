<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


if (isset($_GET['query'])) {
    $search = trim($_GET['query']);
    
    $reservationcodes=$db->query('select * from tablereservations where "reservationcode" LIKE :code ',[
        'code'=>"%$search%"
    
    
    ])->get();
    
 
}
