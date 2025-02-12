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


//get the oldfilename
$oldfilename = $db->query('SELECT photo FROM cuisine WHERE "cuisineID" = :id', [
    'id' => $_GET['id']
])->find();

if (!$oldfilename) {
    die("Error: Cuisine not found.");
}

// Ensure it's an array before accessing ['photo']
$oldfilename = is_array($oldfilename) ? $oldfilename['photo'] : '';


//unlink the old file name

$oldFilePath = base_path("public/restaurants/folder$userid/menus/") . $oldfilename;


//give the hashed name to the new updated photo now 
$fileTmp=$_FILES['photo']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['photo']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name

$newupdatedfilename=$newfilename.".".$fileExtension;
// $oldfilename=$oldfilename['photo'].".".$fileExtension;


$targetdir=base_path("public/restaurants/folder$userid/menus/");
isset($newupdatedfilename)?$targetFile=$targetdir.$newupdatedfilename :$targetFile=$targetdir.$oldfilename;


move_uploaded_file($fileTmp,$targetFile);


if (isset($newupdatedfilename)) {
    unlink($oldFilePath); // Delete the old file
    $filenameToUse = $newupdatedfilename; // Use the new file
} else {
    $filenameToUse = $oldfilename; // Fall back to the old file
}


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
 
    'photo' => isset($filenameToUse)??NULL,

    'available' => ($_POST['available'] == 'yes') ? 1 : 0,
]);
 
$size=$_POST['sizes'];

$db->query('UPDATE cuisinesizes cs
    SET cs.size = :size, 
        cs.price = :price
    FROM cuisine c
    WHERE cs.cuisineID = c.cuisineID
    AND c.cuisineID = :id', [
    'id' => $_GET['id'],
    'size' => $size,
    'price' => $_POST['prices'][$size] 
]);


// redirect the user
header('location: /mymenus');
die();
