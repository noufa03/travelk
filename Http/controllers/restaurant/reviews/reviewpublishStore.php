<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$publish = ($_POST['status'] == "published") ? "NULL" : "published";

// store review
$review_publish = $db->query('UPDATE reviews SET "status" = :publish WHERE "reviewid" = :id', [
    'publish' => $publish,
    'id' => $_POST['reviewid']
]);

$msg = ($publish === 'published') ? 'Review published successfully' : 'Review unpublished successfully';

// redirect the user
header('location: /myreviews_rest');

Session::flash('toast', $msg);
die();
