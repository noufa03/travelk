<?php

$district = 20;

view("areaadmin/places/create.view.php", [
    'heading' => 'Locations',
    'district' => $district,
    'errors' => []
]);