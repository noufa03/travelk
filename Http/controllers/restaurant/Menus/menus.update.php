<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

// // find the corresponding note
$cuisine = $db->query('select * from cuisine where "cuisineID" = :id', [
    'id' =>$_GET['id']
])->findOrFail();

// // authorize that the current user can edit the cuisine
authorize($cuisine['resID'] === $userid);

// validate the form
$errors = [];

// if (! Validator::string($_POST['body'], 1, 10)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

// if no validation errors, update the record in the cuisines database table.
if (count($errors)) {
    return view('restaurant/Menu/menus.edit.view.php', [
        'heading' => 'Edit cuisine',
        'errors' => $errors,
        'cuisine' => $cuisine
    ]);
}

$db->query('update cuisine set "cuisine_name"= :name,"cuisine_type" =:type,"description"=:des,"price"=:price,"photo"=:photo  where "cuisineID" = :id', [
    'id' => $_GET['id'],
    'name' => $_POST['cuisine_name'],
    'type'=>$_POST['cuisine_type'],
    'des'=>$_POST['description'],
    'price'=>$_POST['price'],
  'photo' => isset($_POST['photo']) ? $_POST['photo'] : NULL,

    
    
]);

// redirect the user
header('location: /mymenus');
die();
