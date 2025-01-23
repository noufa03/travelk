<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

$userid=31;

view("rental/dashboard/index.view.php",[
    'heading' => 'Driver Dashboard',
    'userid'=>$userid

]);