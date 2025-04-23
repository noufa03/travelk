<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query('DELETE FROM locations where locationid = :id', [
  'id' => $_POST['id']
]);

$db->query('DELETE FROM places where placeid = :id', [
  'id' => $_POST['id']
]);

header('location: /admin/locations');
exit();