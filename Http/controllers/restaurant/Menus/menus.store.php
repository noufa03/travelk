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


$db->query('INSERT INTO cuisine("cuisineID","resID","cuisine_name","cuisine_type","description","price","photo") VALUES(:cid,:id, :name,:type,:des,:price,:photo)', [
   'cid'=>$userid.mt_rand(1, 100),
   'id'=>$userid,
   'name'=>$_POST['cuisine_name'],
   'type'=>$_POST['cuisine_type'],
   'des'=>$_POST['description'],
   'price'=>$_POST['price'],
   'photo'=>$newfilename
   
]);


header('location: /mymenus');
die();
