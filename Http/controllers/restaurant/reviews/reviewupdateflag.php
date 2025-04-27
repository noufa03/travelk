<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$flag = ($_POST['status'] == "flagged") ? "NULL" : "flagged";
$review_flag = $db->query('UPDATE cuisine_review SET "status" = :flag WHERE "cuisineID" = :id and "reviewid"=:rid', [
    'flag' => $flag,
    'id' => $_POST['cuisineID'],
    'rid' => $_POST['reviewid']
]);

$msg = ($flag == 'flagged') ? 'Review has been flagged' : 'Review has been unflagged';

header('location: /myreviews_rest');

Session::flash('toast', $msg);

die();
