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
$oldfilename=$db->query('select photo from cuisine where "cuisineID"=:id ',[
'id'=>$_GET['id']
])->find();

$oldfilename=$oldfilename['photo'];

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
$oldfilename=$oldfilename['photo'].".".$fileExtension;


$targetdir=base_path("public/restaurants/folder$userid/menus/");
isset($newupdatedfilename)?$targetFile=$targetdir.$newupdatedfilename :$targetFile=$targetdir.$oldfilename;


move_uploaded_file($fileTmp,$targetFile);


if (isset($newupdatedfilename)) {
    unlink($oldFilePath); // Delete the old file
    $filenameToUse = $newupdatedfilename; // Use the new file
} else {
    $filenameToUse = $oldfilename; // Fall back to the old file
}


$db->query('update cuisine set "cuisine_name"= :name,"cuisine_type" =:type,"description"=:des,"price"=:price,"photo"=:photo  where "cuisineID" = :id', [
    'id' => $_GET['id'],
    'name' => $_POST['cuisine_name'],
    'type'=>$_POST['cuisine_type'],
    'des'=>$_POST['description'],
    'price'=>$_POST['price'],
  'photo' => $filenameToUse,

    
    
]);

// redirect the user
header('location: /mymenus');
die();
