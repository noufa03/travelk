<?php


use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
//add rely
$addreply = $db->query('update  reviews set "reply"=:reply where "reviewid"=:rid', [
    'reply' => $_POST['reply'],
    'rid' => (int)$_POST['id']


]);


header('location:/myreviews_rest');

Session::flash('toast', 'Reply sent successfully');
die();
