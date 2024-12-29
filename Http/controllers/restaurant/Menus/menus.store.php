<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();

$userid=$user['userid'];
$errors = [];

if (! Validator::string($_POST['description'], 1, 1000)) {
    $errors['description'] = 'A body of no more than 1,000 characters is required.';
}

// if(!Validator::smallerThan($_POST['price'],1000)){

//     $errors['price'] = 'price is too small.';
// }

if (! empty($errors)) {
    return view("restaurant/Menus/menus.add.view.php", [
    
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO cuisine("cuisineID","resID","cuisine_name","cuisine_type","description","price") VALUES(:cid,:id, :name,:type,:des,:price)', [
   'cid'=>$userid.mt_rand(1, 100),
   'id'=>$userid,
   'name'=>$_POST['cuisine_name'],
   'type'=>$_POST['cuisine_type'],
   'des'=>$_POST['description'],
   'price'=>$_POST['price']
   
]);


// header('location: /mymenus');
// die();
