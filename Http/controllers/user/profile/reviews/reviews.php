<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();


$reviews=$db->query('SELECT * FROM reviews WHERE traid=:traid',[
'traid'=>$userID['userid']

])->get();


$cuisine_reviews=$db->query('SELECT * FROM cuisine_review WHERE traid=:traid',[
'traid'=>$userID['userid']

])->get();


view('user/profile/reviews/reviews.view.php', [
  'reviews'=>$reviews,
  'cuisine_reviews'=>$cuisine_reviews,
  'heading'=>'My Reviews'
]);

?>