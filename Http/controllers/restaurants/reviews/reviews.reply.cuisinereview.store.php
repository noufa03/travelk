<?php


use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$addreply = $db->query('update  cuisine_review set "reply"=:reply where "reviewid"=:rid', [
    'reply' => $_POST['reply'],
    'rid' => (int)$_POST['reviewid']


]);


header('location:/myreviews_rest');

Session::flash('toast', 'Reply sent successfully');
die();
