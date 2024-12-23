<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$places = $db->query('SELECT * FROM locations')->get();



view('user/discover.view.php', [
    'places' => $places
]);