<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Http\Forms\AddTable;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = AddTable::validate($attributes = [
    'tableprice' => $_POST['tableprice'],
    'category' => $_POST['category'],

    'tablepricetype' => $_POST['tablepricetype'] ?? ''

]);
$table = $db->query('INSERT INTO  restaurant_table("resID","tableprice","category","status","tablepricetype") VALUES(:id,:price,:cat,:status,:pt)', [

    'id' => $userid,

    'price' => ($_POST['tablepricetype'] === 'NoCharge') ? 0 : $_POST['tableprice'],
    'cat' => ($_POST['category'] === 'custom') ? 'custom:' . $_POST['customtable'] : $_POST['category'],


    'status' => 1,
    'pt' => $_POST['tablepricetype']

]);
header('location: /tables');
die();
