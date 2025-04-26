<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$offers = $db->query('select * from dailyoffers where "offer_id" = :id', [
    'id' => $_POST['id']
])->find();


authorize($offers['resID'] === $userid);
//delete 1 offers according to the offerid
$db->query('delete from dailyoffers where "offer_id" = :id', [
    'id' => $_POST['id']
]);

header('location: /myoffers');
Session::flash('toast', 'The offer has been successfully deleted.');

exit();
