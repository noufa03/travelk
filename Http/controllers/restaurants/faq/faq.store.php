<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];


$errors = [];

if (! Validator::string($_POST['question'], 1, 1000)) {
    $errors['question'] = 'A question of no more than 100 characters is required.';
}

if (! Validator::string($_POST['answer'], 1, 1000)) {
    $errors['answer'] = 'A answer of no more than 100 characters is required.';
}

if (! empty($errors)) {
    return view("restaurant/faq/faq.add.view.php", [
        'heading' => 'Add FAQ',
        'errors' => $errors
    ]);
}



$db->query('INSERT INTO restaurants_faqs("resID","question", "answer") VALUES(:id,:q, :a)', [
     'id' => $userid,  
    'q'=>$_POST['question'],
    'a'=>$_POST['answer']
]);

header('location: /FAQs_rest');
die();
