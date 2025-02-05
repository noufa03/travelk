<?php



use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];

$tables = $db->query('select * from restaurant_table where "resID" =:resID ',[
'resID'=>$userid

])->get();


view("restaurant/table/index.view.php", [
    'heading' => 'Tables',
    'tables' => $tables
]);