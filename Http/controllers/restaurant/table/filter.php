<?php

use Core\App;
use Core\Database;
use Models\Restuarant_Table;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$status = ($_POST['table'] == 'booked') ? 0 : 1;


$tables = Restuarant_Table::n_findByStatus($userid,$status);

view("restaurant/table/index.view.php", [
    'heading' => 'Tables',
    'tables' =>$tables,
    'userid' => $userid,


]);
