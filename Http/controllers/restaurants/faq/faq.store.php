<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Session;
use Http\Forms\AddFaqs;
use Models\Restuarant_Faqs;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

$form=AddFaqs::validate($attributes=[
'question'=>$_POST['question'],
'answer'=>$_POST['answer']


]);


Restuarant_Faqs::n_InsertFaqs($userid,$_POST['question'],$_POST['answer']);
header('location: /FAQs_rest');
Session::flash('toast', 'The FAQ section has been successfully added and is now available.');

die();
