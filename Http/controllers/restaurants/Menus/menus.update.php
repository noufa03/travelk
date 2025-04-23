<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

// // find the corresponding note
$cuisine = $db->query('select * from cuisine where "cuisineID" = :id', [
    'id' => $_GET['id']
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

//new photo
if (!empty($_FILES['photo']['tmp_name'])) {
    $fileTmp = $_FILES['photo']['tmp_name']; //old path
    //dd($fileTmp);// "/tmp/phpJvfKJu"
    $filename = $_FILES['photo']['name'];
    $filenameCops = explode('.', $filename); //explode the file name
    $fileExtension = end($filenameCops); //extension eka gaththa

    $newfilename = md5(time() . $filename); //make a new file name
    $newfilename = $newfilename . "." . $fileExtension;

    $targetdir = base_path("/public/restaurants/folder$userid/menus/");

    $targetFile = $targetdir . $newfilename; //new path

    move_uploaded_file($fileTmp, $targetFile);
    $photo = 'restaurants/folder' . $userid . '/menus/' . $newfilename;

    unlink(base_path("/public/") . $_POST['photo']);

    $db->query('UPDATE cuisine 
    SET "cuisine_name" = :name, 
        "cuisine_type" = :type, 
        "description" = :des, 
    
        "photo" = :photo,  
         
        "available" = :available  
        
    WHERE "cuisineID" = :id', [
        'id' => $_GET['id'],
        'name' => $_POST['cuisine_name'],
        'type' => $_POST['cuisine_type'],
        'des' => $_POST['description'],

        'photo' => $photo,

        'available' => ($_POST['available'] == 'yes') ? 1 : 0,
    ]);

    $sizes = $_POST['sizes'];

    foreach ($sizes as $size) {
      



        $db->query('UPDATE cuisinesizes 
        SET size = :size, 
            "price" = :price 
        WHERE "cuisineID" = :id', [
            'id' => $_GET['id'],
            'size' => $size,
            'price' => $_POST['prices'][$size]
        ]);
    }



    // redirect the user
    header('location: /mymenus');
    die();
}

//old one
$photo = $_POST['photo'];
$db->query('UPDATE cuisine 
    SET "cuisine_name" = :name, 
        "cuisine_type" = :type, 
        "description" = :des, 
    
        "photo" = :photo,  
         
        "available" = :available  
        
    WHERE "cuisineID" = :id', [
    'id' => $_GET['id'],
    'name' => $_POST['cuisine_name'],
    'type' => $_POST['cuisine_type'],
    'des' => $_POST['description'],

    'photo' => $photo,

    'available' => ($_POST['available'] == 'yes') ? 1 : 0,
]);
//sizes in the db
$cuisine_sizes=$db->query('select size from cuisinesizes where "cuisineID"=:cid',[
    'cid'=>$_GET['id']

])->get();

//flatten the array 
// Extract sizes from DB result
$cuisine_sizes = array_column($cuisine_sizes, 'size');

// Get new sizes to insert
$newSizes = array_diff($_POST['sizes'], $cuisine_sizes);

// Update existing sizes (only those in the DB)
foreach ($cuisine_sizes as $size) {
    if (in_array($size, $_POST['sizes'])) {
        $update = $db->query('UPDATE cuisinesizes 
            SET "price" = :price 
            WHERE "cuisineID" = :id AND "size" = :size', [
            'id' => $_GET['id'],
            'size' => $size,
            'price' => $_POST['prices'][$size] ?? 0
        ]);
    }
}

// Insert new sizes
foreach ($newSizes as $size) {
    $insert = $db->query('INSERT INTO cuisinesizes("cuisineID", "size", "price") 
        VALUES (:cid, :size, :price)', [
        'cid' => $_GET['id'],
        'size' => $size,
        'price' => $_POST['prices'][$size] ?? 0
    ]);
}


// redirect the user4

header('location: /mymenus');

Session::flash('toast', 'Cuisine Updated successfully');
die();
