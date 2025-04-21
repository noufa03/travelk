<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

view("restaurant/Menus/menus.add.view.php", [
    'heading' => 'Add Menu',
    'userid' => $userid,
    'errors' => Session::get('errors')

]);
