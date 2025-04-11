<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];
$errors = [];

// if (! Validator::string($_POST['description'], 1, 1000)) {
//     $errors['description'] = 'A body of no more than 1,000 characters is required.';
// }

// if(!Validator::smallerThan($_POST['price'],1000)){

//     $errors['price'] = 'price is too small.';
// }

if (! empty($errors)) {
    return view("restaurant/table/tables.add.view.php", [
    
        'errors' => $errors,
        'userid'=>$userid
    ]);
}


$table=$db->query('INSERT INTO  restaurant_table("resID","tableprice","category","status","tablepricetype") VALUES(:id,:price,:cat,:status,:pt)', [

 'id'=>$userid,

 'price'=>($_POST['tablepricetype']=== 'NoCharge')? 0 : $_POST['tableprice'],
'cat' => ($_POST['category'] === 'custom') ? 'custom:'. $_POST['customtable'] : $_POST['category'],


 'status'=>1,
 'pt'=>$_POST['tablepricetype']
   
]);


header('location: /tables');
die();
