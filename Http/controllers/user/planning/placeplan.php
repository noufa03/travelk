<?php
dd($_POST);
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);



//lot more code here
$selectedPlaces = $_POST['selectedPlaces'];
$selectedPlacesDetails = $_POST['selectedPlacesDetails'];

view('user/planning/placeplan.view.php',[
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesDetails' => $selectedPlacesDetails
]);