<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];



view("restaurant/table/tables.add.view.php", [
    'heading'=>'Add Table',
    'userid'=>$userid

]);

