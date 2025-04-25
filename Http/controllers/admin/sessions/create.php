<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = $_SESSION['errors'] ?? '';
unset($_SESSION['errors']);

view("admin/sessions/create.view.php", [
    'heading' => 'Locations',
    'errors' => $errors,
]);