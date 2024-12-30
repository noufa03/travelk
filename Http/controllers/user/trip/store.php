<?php

$selectedPlacesDetails = json_decode($_POST['selectedPlacesDetails'], true);

view('trip/store.view.php',[
    'selectedPlacesDetails' => $selectedPlacesDetails
]);
