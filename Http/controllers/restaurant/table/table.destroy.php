<?php


use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$table = $db->query('select * from restaurant_table where tableid = :id', [
    'id' => $_POST['tableid']
])->findOrFail();

authorize($table['resID'] === $userid);
//if the tbale is avaiable(not booked we can delete it)
if ($table['status'] == 1) {
    $db->query('delete from restaurant_table where tableid = :id', [
        'id' => $_POST['tableid']
    ]);

    header('location: /tables');
    Session::flash('toast', 'The table has been successfully deleted and is no longer accessible in the system.');
    exit();
}

header('location: /tables');
exit();
