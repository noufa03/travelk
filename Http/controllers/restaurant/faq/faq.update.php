<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$faqs = $db->query('select * from restaurants_faqs where "id" = :id', [
    'id' => $_POST['id']
])->findOrFail();


authorize($faqs['resID'] === $userid);


$errors = [];

if (! Validator::string($_POST['question'], 1, 100)) {
    $errors['question'] = 'A question of no more than 100 characters is required.';
}

if (! Validator::string($_POST['answer'], 1, 100)) {
    $errors['answer'] = 'A answer of no more than 100 characters is required.';
}

if (! empty($errors)) {
    return view("restaurant/faq/faq.edit.view.php", [
        'heading' => 'Edit FAQ',
        'errors' => $errors,
        'faqs' => $faqs
    ]);
}

$db->query('update restaurants_faqs set "question"=:q,"answer"=:a where "id" = :id', [
    'id' => $_POST['id'],
    'q' => $_POST['question'],
    'a' => $_POST['answer']

]);


header('location: /FAQs_rest');
Session::flash('toast', 'The FAQ section has been successfully updated and is now live.');

die();
