<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

// dd($_POST);
$errors = [];

if (! Validator::string($_POST['issue'], 0, 100)) {
    $errors['issue'] = 'A issue of no more than 100 characters is required.';
}
$issues = $db->query('select * from issues where "userid"=:id ', [
    'id' => $userid
])->get();



if (! empty($errors)) {
    return view("rental/issues/index.view.php", [
        'heading' => 'Report Issue',
        'issues' => $issues,
        'errors' => $errors
    ]);
}
$issue = !empty($_POST['issue']) ? $_POST['issue'] : 'No,des';


$db->query('INSERT INTO issues("userid","issue", "status") VALUES(:id,:issue, :status)', [
    'id' => $userid,
    'issue' => 'Issue(des): ' . $issue . ' Type: ' . $_POST['reportIssue'],
    'status' => 'pending'
]);

header('location: /issues/rental?id=' . $userid);
die();
