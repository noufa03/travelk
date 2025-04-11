<?php 




use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];


$reviews = $db->query('select * from reviews where "reviewee_type" =:type and "reviewee_type_id"=:id',[
'type'=>'driver',
'id'=>$userid

])->get();




 

view("rental/reviews/reviews.view.php", [
    'heading' => 'My reviews',
    'reviews' => $reviews,
    
   
    
]);
