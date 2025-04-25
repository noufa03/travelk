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
    'seatcapacity' => $_POST['seatcapacity'],
    'tablepricetype' => $_POST['tablepricetype'] ?? '',
    'tablename'=>$_POST["tablename"]??''

]);

$table = Restuarant_Table::n_AddTable($userid,$attributes['tableprice'],$attributes['tablepricetype'],$attributes['seatcapacity'],$attributes['tablename']);




header('location: /tables');
Session::flash('toast', 'The new table/tables has been successfully added to the system.');

die();
