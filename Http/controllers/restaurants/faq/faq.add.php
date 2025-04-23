
<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

view("restaurant/faq/faq.add.view.php", [
    'heading' => 'Add FAQ',
    'userid' => $userid,
    'errors' => Session::get('errors')

]);
