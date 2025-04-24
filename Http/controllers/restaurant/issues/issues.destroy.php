<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$issue = $db->query('select * from issues where "issueid"= :id', [
    'id' => $_POST['issueid']
])->findOrFail();

authorize($issue['userid'] === $userid);

$db->query('delete from issues where "issueid"= :id', [
    'id' => $_POST['issueid']
]);

header('location:/issues/restaurant');
Session::flash('toast', 'Your issue has been successfully removed.');
exit();
