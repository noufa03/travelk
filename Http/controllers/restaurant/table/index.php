<?php



use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$tables = $db->query('select * from `table` where resID = 23')->get();

view("restaurant/table/index.view.php", [
    'heading' => 'Tables',
    'tables' => $tables
]);