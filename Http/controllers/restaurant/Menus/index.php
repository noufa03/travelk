<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];

$cuisines = $db->query('select * from cuisine where "resID" = :resID',[
'resID'=>$userid

])->get();

view("restaurant/Menus/index.view.php", [
    'heading' => ' Menu List',
    'cuisines' => $cuisines,
    'userid'=>$userid
]);