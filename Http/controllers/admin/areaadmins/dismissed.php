<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$dismissed = $db->query('SELECT * FROM dismissed')->get();

view("admin/areaadmins/dismissed.view.php", [
  'heading' => 'Dismissed',
  'dismissed' => $dismissed
]);