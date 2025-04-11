<?php
// dd("hello");
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];
// dd($id);

$place = $db->query('SELECT * FROM locations WHERE "locationid" = :id', ['id' => $id])->find();
// dd($place);
$restid = $place['userid'];
// dd($restid);
$resturant_details = $db->query('SELECT * FROM restaurants WHERE "resID" = :resID', ['resID' => $restid])->find();
$resturant_display_details = $db->query('SELECT * FROM restaurant_details WHERE "id" = :id', ['id' => $restid])->find();
// dd($resturant_display_details);
// dd($resturant_details);


view('user/locations/rest.show.view.php', [
    'place' => $place,
    'resturant_details' => $resturant_details,
    'resturant_display_details' => $resturant_display_details
]);