<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$publish = ($_POST['status'] == "published") ? "NULL" : "published";
$review_publish = $db->query('UPDATE cuisine_review SET "status" = :publish WHERE "reviewid" = :id', [
    'publish' => $publish,
    'id' => $_POST['reviewid']
]);


// redirect the user
header('location: /myreviews_rest');
die();
