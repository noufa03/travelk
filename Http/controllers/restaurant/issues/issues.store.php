<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Models\Restuarant;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

// dd($_POST);
$errors = [];

if (! Validator::string($_POST['issue'], 0, 100)) {
    $errors['issue'] = 'A issue of no more than 100 characters is required.';
}


if (! empty($errors)) {
    return view("restaurant/issues/index.view.php", [
        'heading' => 'Report Issue',
        'errors' => $errors
    ]);
}
$issue = !empty($_POST['issue']) ? $_POST['issue'] : 'No,des';


$db->query('INSERT INTO issues("userid","issue", "status") VALUES(:resid,:issue, :status)', [
    'resid' => $userid,
    'issue' => 'Issue(des): ' . $issue . ' Type: ' . $_POST['reportIssue'],
    'status' => 'pending'
]);

$resdetails=Restuarant::n_findWithDistrictId($userid);
$mydistrict=$resdetails['districtid'];

$areaadmin=$db->query('select * from areaadmins where "district"=:id ',[

'id'=>$mydistrict

])->find();
$areaadmin=$areaadmin["areaadminid"]?? 1;

 $notifications = $db->query(
        'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
        [
            'id' => $areaadmin,
            'msg' => 'Issue(des): ' . $issue . ' Type: ' . $_POST['reportIssue'],
            'type' => 'issue',
            'read' => 'false',
        ]
    );
    
header('location: /issues/restaurant');
Session::flash('toast', 'Your issue has been successfully reported. Thank you for your feedback.');
die();
