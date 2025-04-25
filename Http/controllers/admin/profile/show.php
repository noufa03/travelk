<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// if (!$id) {
//     die('Invalid request. Area Admin ID is required.');
// }

$mainadmin = $db->query("SELECT * FROM mainadmin")->find();

view("admin/profile/show.view.php", [
  'heading' => 'Area Admins',
  'mainadmin' => $mainadmin
]);
