<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

// if (! Validator::string($_POST['body'], 1, 1000)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
$resid=23;
$db->query('INSERT INTO cuisine(cuisineID,resID,cuisine_name,cuisine_type,description,price) VALUES(:cid,:id, :name,:type,:des,:price)', [
   'cid'=>$_POST['cuisineID'],
   'id'=>$resid,
   'name'=>$_POST['cuisine_name'],
   'type'=>$_POST['cuisine_type'],
   'des'=>$_POST['description'],
   'price'=>$_POST['price']
   
]);


header('location: /mymenus');
die();
