<?php

use Core\App;
use Core\Database;
use Core\Mail;

$db = App::resolve(Database::class);

$places = $db->query('SELECT COUNT(*) FROM places')->find();
$restuarants = $db->query('SELECT COUNT(*) FROM restaurants')->find();
$accommodation = $db->query('SELECT COUNT(*) FROM accommodation')->find();
$carstorent = $db->query('SELECT COUNT(*) FROM drivers')->find();
$areaadmins = $db->query('SELECT COUNT(*) FROM areaadmins')->find();
$applications = $db->query('SELECT COUNT(*) FROM applications')->find();


view("admin/index.view.php", [
  'places' => $places,
  'restaurants' => $restaurants,
  'accommodation' => $accommodation,
  'carstorent' => $carstorent,
  'areaadmins' => $areaadmins,
  'applications' => $applications
]);