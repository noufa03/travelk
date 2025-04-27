<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisine = $db->query('select * from cuisine where "cuisineID"= :id', [
    'id' => $_POST['cuisineID']
])->findOrFail();

authorize($cuisine['resID'] === $userid);

$db->query('delete from cuisine where "cuisineID"= :id', [
    'id' => $_POST['cuisineID']
]);

header('location: /mymenus');

Session::flash('toast', 'Cuisine deleted successfully');
exit();
