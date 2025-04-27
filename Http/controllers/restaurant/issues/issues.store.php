<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Models\Restuarant;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//report review
if (isset($_GET['reviewid'])) {
    $errors = [];
    
  
    if (! Validator::string($_POST['reportIssue'], 10, 100)) {
        $errors['reportIssue'] = '** Isuue is required.';
    }


    if (! empty($errors)) {
        return view("restaurant/issues/index.view.php", [
            'heading' => 'Report Issue',
            'errors' => $errors
        ]);
    }
    $issue = !empty($_POST['issue']) ? $_POST['issue'] : 'No,des';

    //distrct id eken district eka ganna
    $resdetails = Restuarant::n_findWithDistrictId($userid);
    $mydistrict = $resdetails['districtid'];
    //finding the areaadmin according to the district id if there is not areaadmin will forward it to the admin
    $areaadmin = $db->query('select * from areaadmins where "district"=:id ', [

        'id' => $mydistrict

    ])->find();
    $areaadmin = $areaadmin["areaadminid"] ?? 1;

    $notifications = $db->query(
        'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
        [
            'id' => $areaadmin,
            'msg' => $_POST['reportIssue'],
            'type' => 'issue',
            'read' => 'false',
        ]
    );

    $db->query('INSERT INTO issues("userid","issue", "status","adminid") VALUES(:resid,:issue, :status,:adminid)', [
        'resid' => $userid,
        'issue' => $_POST['reportIssue'] . ' | Review ID: ' . htmlspecialchars($_GET['reviewid']) . ' | Review: ' . htmlspecialchars($_GET['review']),
        'status' => 'pending',
        'adminid' => $areaadmin
    ]);
} else {

    $errors = [];

      if (! Validator::string($_POST['reportIssue'], 10, 100)) {
        $errors['reportIssue'] = '** issue is required.';
    }



    if (! empty($errors)) {
        return view("restaurant/issues/index.view.php", [
            'heading' => 'Report Issue',
            'errors' => $errors
        ]);
    }
    $issue = !empty($_POST['issue']) ? $_POST['issue'] : 'No,des';


    $resdetails = Restuarant::n_findWithDistrictId($userid);
    $mydistrict = $resdetails['districtid'];

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
}




header('location: /issues/restaurant');
Session::flash('toast', 'Your issue has been successfully reported. Thank you for your feedback.');
die();
