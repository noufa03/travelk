<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

$fileTmp=$_FILES['photo']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['photo']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name
$newfilename=$newfilename.".".$fileExtension;

$targetdir=base_path("/public/restaurants/folder$userid/menus/");

$targetFile=$targetdir.$newfilename;//new path

move_uploaded_file($fileTmp,$targetFile);




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


$cuisine=$db->query('INSERT INTO cuisine("resID","cuisine_name","cuisine_type","description","photo") VALUES(:id, :name,:type,:des,:photo)', [
 
   'id'=>$userid,
   'name'=>$_POST['cuisine_name'],
   'type'=>$_POST['cuisine_type'],
   'des'=>$_POST['description'],
 
   'photo'=>$newfilename
   
]);
 $lastInsertedId = $db->connection->lastInsertId();
 
 
$sizes=$_POST['sizes'];

foreach ($sizes as $size ) {
   $cuisinesize= $db->query('INSERT INTO cuisinesizes("cuisineID", "size", "price") VALUES (:cid, :size, :price)', [
        'cid' => $lastInsertedId,
        'size' => $size,   
        'price' => $_POST['prices'][$size] 
    ]);
}





header('location: /mymenus');
die();
