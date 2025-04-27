<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$mainadmin = $db->query("SELECT * FROM mainadmin")->find();

view("admin/profile/show.view.php", [
  'heading' => 'Area Admins',
  'mainadmin' => $mainadmin
]);
