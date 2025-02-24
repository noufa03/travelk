<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];



 

view("restaurant/issues/index.view.php", [
    'heading' => 'Report Issue',
  
    
   
    
]);
