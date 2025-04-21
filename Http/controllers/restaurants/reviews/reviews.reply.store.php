<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$addreply = $db->query('update  reviews set "reply"=:reply where "reviewid"=:rid', [
    'reply' => $_POST['reply'],
    'rid' => (int)$_POST['id']


]);

header('location:/myreviews_rest');
die();
