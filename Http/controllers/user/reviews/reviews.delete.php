<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();




if(isset($_POST['reviewid']) && !empty($_POST['reviewid'])){

    $reviews=$db->query('SELECT * FROM reviews WHERE traid=:traid',[
    'traid'=>$userID['userid']
    
    ])->findOrFail();
    
    authorize($reviews['traid'] === $userID['userid']);
    
    $db->query('delete from reviews where reviewid = :id', [
        'id' => $_POST['reviewid']
    ]);

}
else{

    $cuisine_reviews=$db->query('SELECT * FROM cuisine_review WHERE traid=:traid',[
        'traid'=>$userID['userid']
    
    ])->findOrFail();
    
    authorize($cuisine_reviews['traid'] === $userID['userid']);
    
    $db->query('delete from cuisine_review where reviewid = :id', [
        'id' => $_POST['cuisine_reviewid']
    ]);



}




header('location: /review');
exit();