<?php

use Core\App;
use Core\Database;
use Core\Session;
use Models\Cuisine;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisine = Cuisine::n_findCuisineById($_GET['id']);

$customsizes=$db->query('select * from cuisinesizes where "cuisineID"=:cid',[
'cid'=>$_GET['id']

])->get();


view("restaurant/Menus/sizes/size.add.view.php", [
    'heading' => 'Add Size',
    'userid' => $userid,
    'errors' => Session::get('errors'),
    'cuisine' => $cuisine,
    'customsizes'=>$customsizes

]);
