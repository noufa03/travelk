<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$flag = ($_POST['status'] == "flagged") ? "NULL" : "flagged";
$review_flag = $db->query('UPDATE reviews SET "status" = :flag WHERE "reviewee_type_id" = :id and "reviewid"=:rid', [
    'flag' => $flag,
    'id' => $userid,
    'rid' => $_POST['reviewid']
]);

$msg = ($flag == 'flagged') ? 'Review has been flagged' : 'Review has been unflagged';
// redirect the user
header('location: /myreviews_rest');

Session::flash('toast', $msg);
die();
