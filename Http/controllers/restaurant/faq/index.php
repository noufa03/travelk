<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];
//anonymous faqs  are added by the business not customers

$questions=$db->query('select * from restaurants_faqs  where "resID"=:id',[
'id'=>$userid

])->get();




view("restaurant/faq/index.view.php", [
    'heading' => 'FAQS',
    
    'questions'=>$questions
   
    
]);