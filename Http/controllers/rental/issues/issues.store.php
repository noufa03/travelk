<?php

use Core\App;
use Core\Validator;
use Core\Database;

use Core\Session;
use Models\Rental;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

// dd($_POST);
$errors = [];
//validate issue details
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

$vehicle_details = $db->query('select * from vehicle_details where "id"=:id', [
    'id' => $userid
])->find();

$mydistrict=$vehicle_details['districtid'];

$areaadmin = $db->query('select * from areaadmins where "district"=:id ', [

    'id' => $mydistrict

])->find();

$areaadmin = $areaadmin["areaadminid"] ?? 1;

$notifications = $db->query(
    'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
    [
        'id' => $areaadmin,
        'msg' =>  $_POST['reportIssue'],
        'type' => 'issue',
        'read' => 'false',
    ]
);


$db->query('INSERT INTO issues("userid","issue", "status","adminid") VALUES(:resid,:issue, :status,:adminid)', [
    'resid' => $userid,
    'issue' => $_POST['reportIssue'],
    'status' => 'pending',
    'adminid' => $areaadmin
]);


header('location: /issues/rental');
Session::flash('toast', 'Your issue has been successfully reported. Thank you for your feedback.');
die();
