<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


view('hotel/index.view.php');

    // $db = App::resolve(Database::class);
    // $user = authUser();
    
    // $userid=$user['userid'];