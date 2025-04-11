<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

$available_tables=$db->query('select * from restaurant_table rt join tablereservations tb on tb."tableid"=rt."tableid" where  rt."resID"=:id and tb."reservationstatus" !=:status',[
'id'=>$userid,
'status'=> 'confirmed'
])->get();

// dd($available_tables);

view("restaurant/reservations/reservations.add.view.php", [
    'heading'=>'Add Resevations',
    'userid'=>$userid,
    'available_tables'=>$available_tables

]);

