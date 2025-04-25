<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$areaadminid = $_SESSION['areaadmin']['areaadminid'] ?? null;

$issues = $db->query(
  'SELECT * FROM issues WHERE adminid = :areaadminid',
  [
    'areaadminid' => $areaadminid
  ]
)->get();

//dd($issues);

view("areaadmin/inquiries/show.view.php", [
  'heading' => 'Issues',
  'issues' => $issues
]);