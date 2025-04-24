<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddTable;
use Models\Restuarant_Table;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = AddTable::validate($attributes = [
    'tableprice' => $_POST['tableprice'],
    'category' => $_POST['category'],
    'nooftables' => $_POST['nooftables'],
    'tablepricetype' => $_POST['tablepricetype'] ?? ''

]);
for($i=0;$i<$_POST['nooftables'];$i++){
$table = Restuarant_Table::n_AddTable($userid, $_POST['tableprice'], $_POST['tablepricetype'], $_POST['category'], $_POST['customtable']);

};


header('location: /tables');
Session::flash('toast', 'The new table/tables has been successfully added to the system.');

die();
