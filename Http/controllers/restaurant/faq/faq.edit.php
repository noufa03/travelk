<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//getiing the 1 faq info with get id
$faqs = $db->query('select * from restaurants_faqs where "id"=:id ', [

    'id' => $_GET['id']
])->find();

view("restaurant/faq/faq.edit.view.php", [
    'heading' => 'Edit FAQ',
    'errors' => [],
    'faqs' => $faqs,
]);
