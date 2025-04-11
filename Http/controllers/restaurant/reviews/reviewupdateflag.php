<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// dd($_POST);
$user = authUser();

$userid=$user['userid'];

$flag = ($_POST['status'] == "flagged") ? "NULL" : "flagged";

$review_flag = $db->query('UPDATE cuisine_review SET "status" = :flag WHERE "cuisineID" = :id and "reviewid"=:rid' , [
    'flag' => $flag,
    'id' => $_POST['cuisineID'],
    'rid' =>$_POST['reviewid']
]);



// redirect the user
header('location: /myreviews_rest');
die();
