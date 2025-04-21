<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query('DELETE FROM areaadmins where areaadminid = :id', [
  'id' => $_POST['id']
]);

header('location: /admin/locations');
exit();