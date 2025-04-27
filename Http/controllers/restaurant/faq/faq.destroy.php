<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$faqone = $db->query('select * from restaurants_faqs where "id" = :id', [
    'id' => $_POST['id']
])->findOrFail();


authorize($faqone['resID'] === $userid);

$db->query('delete from restaurants_faqs where "id" = :id', [
    'id' => $_POST['id']
]);

header('location: /FAQs_rest');
Session::flash('toast', 'The FAQ section has been successfully removed.');

exit();
