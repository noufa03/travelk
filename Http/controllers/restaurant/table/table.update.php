<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

use Models\Restuarant_Table;


$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$table = $db->query('select * from restaurant_table where tableid = :id', [
    'id' => $_POST['tableid']
])->findOrFail();



authorize($table['resID'] === $userid);


$errors = [];


if (count($errors)) {
    return view('restaurant/table.edit.view.php', [
        'heading' => 'Edit Table',
        'errors' => $errors,
        'table' => $table
    ]);
}


$updatetable = Restuarant_Table::n_UpdateTable($_POST['tablename'],$_POST['tableprice'],$_POST['seatcapacity'],$_POST['tablepricetype'],$_POST['tableid']);



header('location: /tables');
Session::flash('toast', 'The table has been successfully updated and is now available in the system.');


die();
