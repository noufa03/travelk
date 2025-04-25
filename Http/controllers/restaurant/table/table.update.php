<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

use Models\Restuarant_Table;


$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

// // find the corresponding note
$table = $db->query('select * from restaurant_table where tableid = :id', [
    'id' => $_POST['tableid']
])->findOrFail();


// // authorize that the current user can edit the note
authorize($table['resID'] === $userid);

// validate the form
$errors = [];

// if (! Validator::string($_POST['body'], 1, 10)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('restaurant/table.edit.view.php', [
        'heading' => 'Edit Table',
        'errors' => $errors,
        'table' => $table
    ]);
}


$updatetable = Restuarant_Table::n_UpdateTable($_POST['tablename'],$_POST['tableprice'],$_POST['seatcapacity'],$_POST['tablepricetype'],$_POST['tableid']);


// redirect the user
header('location: /tables');
Session::flash('toast', 'The table has been successfully updated and is now available in the system.');


die();
