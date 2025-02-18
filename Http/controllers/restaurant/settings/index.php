<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];



 

view("restaurant/settings/index.view.php", [
    'heading' => 'Settings',
  
    
   
    
]);
