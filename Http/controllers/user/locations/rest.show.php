<?php
// dd("hello");
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'];

$place = $db->query('SELECT * FROM locations WHERE "locationid" = :id', ['id' => $id])->find();

$restid = $place['userid'];

$resturant_details = $db->query('SELECT * FROM restaurants WHERE "resID" = :resID', ['resID' => $restid])->find();
$resturant_display_details = $db->query('SELECT * FROM restaurant_details WHERE "id" = :id', ['id' => $restid])->find();

$resturant_path = extractResturantPath($place['photos']);

$location_files = getDirectoryFiles($resturant_path, 'locations');
$menu_files = getDirectoryFiles($resturant_path, 'menus');

$all_photos = array_map(function($file) use ($resturant_path) {
    return $resturant_path . $file;
}, array_merge($location_files, $menu_files));

$menu_photos = array_map(function($file) use ($resturant_path) {
    return $resturant_path . $file;
}, $menu_files);

$location_photos = array_map(function($file) use ($resturant_path) {
    return $resturant_path . $file;
}, $location_files);


$reviews_with_names = $db->query(
    'SELECT r.*, t.user_name AS traveller_name , t.profile AS traveller_profile
     FROM reviews r 
     JOIN travelers t ON r.traid = t.traid 
     WHERE r.status = :status AND r.locationid = :locationid',
    [
        'status' => 'flagged',
        'locationid' => $id
    ]
)->get();

foreach($reviews_with_names as &$review){
    if($review['traveller_profile'] == NULL){
        $review['traveller_profile'] = '/assets/uploads/profiles/profile_placeholder.jpg';
    }
}

view('user/locations/rest.show.view.php', [
    'place' => $place,
    'resturant_details' => $resturant_details,
    'resturant_display_details' => $resturant_display_details,
    'all_photos' => $all_photos,
    'menu_photos' => $menu_photos,
    'location_photos' => $location_photos,
    'reviews_with_names' => $reviews_with_names
]);