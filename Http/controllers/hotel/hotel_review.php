<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT userid from users where email= :userEmail",['userEmail'=>$userEmail])->find();