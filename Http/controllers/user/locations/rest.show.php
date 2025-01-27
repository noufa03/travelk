<?php
// dd("hello");
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$place = $db->query('SELECT * FROM locations WHERE locationid = :id', ['id' => $id])->find();

view('user/locations/rest_view.view.php', [
    'place' => $place
]);