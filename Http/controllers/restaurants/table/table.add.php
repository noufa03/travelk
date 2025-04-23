<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

view("restaurant/table/tables.add.view.php", [
    'heading' => 'Add Table',
    'userid' => $userid,
    'errors' => Session::get('errors')

]);
