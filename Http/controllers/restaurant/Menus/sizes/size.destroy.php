<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisinesize = $db->query('select * from cuisinesizes where "sizeID"= :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize($cuisine['resID'] === $userid);

$db->query('delete from cuisinesizes where "sizeID"= :id', [
    'id' => $_POST['id']
]);

header('location: /menu/add/size?id='.$cuisinesize['cuisineID']);

Session::flash('toast', 'Size deleted successfully');
exit();
