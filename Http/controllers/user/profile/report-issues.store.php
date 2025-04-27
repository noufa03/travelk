<?php

use Core\Session;
use Models\User;
use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];
$userid = User::i_getUserID($userEmail);

$errors = [];

if (! Validator::string($_POST['issue_description'], 0, 100)) {
    $errors['issue_description'] = 'A issue of no more than 100 characters is required.';
}


if (! empty($errors)) {
    return view("user/profile/report-issues.view.php", [
        'heading' => 'Report Issue',
        'errors' => $errors
    ]);
}
$issue = !empty($_POST['issue_description']) ? $_POST['issue_description'] : 'No,description';

$areaadmin = 1;


$notifications = $db->query(
    'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
    [
        'id' => $areaadmin,
        'msg' =>  $_POST['issue_description'],
        'type' => 'issue',
        'read' => 'false',
    ]
);


$db->query('INSERT INTO issues("userid","issue", "status","adminid") VALUES(:resid,:issue, :status,:adminid)', [
    'resid' => $userid['userid'],
    'issue' => $_POST['issue_description'],
    'status' => 'pending',
    'adminid' => $areaadmin
]);


Session::flash('toast', 'Issue reported successfully');

view('user/profile/report-issues.view.php',[
  'heading' => 'Report Issues',
]);