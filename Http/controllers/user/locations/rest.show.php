<?php
// dd("hello");
use Core\App;
use Core\Database;



$db = App::resolve(Database::class);

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $restid;
}

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

$cuisinesRaw = $db->query('
    SELECT 
        c.*, 
        cs."sizeID", cs.size, cs.price, 
        cr."reviewid", cr.ratings, cr.review, cr."traid", cr.status,
        t.user_name AS traveller_name, 
        t.profile AS traveller_profile
    FROM cuisine c
    LEFT JOIN cuisinesizes cs ON c."cuisineID" = cs."cuisineID"
    LEFT JOIN cuisine_review cr ON c."cuisineID" = cr."cuisineID" AND cr.status = \'flagged\'
    LEFT JOIN travelers t ON cr."traid" = t."traid"
    WHERE c."resID" = :resID
', ['resID' => $restid])->get();
// dd($cuisinesRaw);

$cuisines = [];

foreach ($cuisinesRaw as $row) {
    $cid = $row['cuisineID'];

    // Initialize cuisine if not set
    if (!isset($cuisines[$cid])) {
        $cuisines[$cid] = [
            'cuisineID' => $cid,
            'name' => $row['cuisine_name'], // or other fields from `cuisine` table
            'cuisine_type' => $row['cuisine_type'],
            'description' => $row['description'] ?? '',
            'photo' => $row['photo'] ?? '',
            'sizes' => [],
            'flagged_reviews' => []
        ];
    }

    // Append size if not already added
    if (!empty($row['sizeID'])) {
        $cuisines[$cid]['sizes'][] = [
            'sizeID' => $row['sizeID'],
            'size' => $row['size'],
            'price' => $row['price']
        ];
    }

    // Append flagged review if present
    if (!empty($row['reviewid'])) {
        $cuisines[$cid]['flagged_reviews'][] = [
            'reviewid' => $row['reviewid'],
            'ratings' => $row['ratings'],
            'review' => $row['review'],
            'traid' => $row['traid'],
            'user_name' => $row['user_name'],
            'profile' => $row['profile'] ??  '/assets/uploads/profiles/profile_placeholder.jpg',
            'status' => $row['status']
        ];
    }
}

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else{
    $user = null;
}
// If you want indexed array:
$cuisines = array_values($cuisines);
// dd($cuisines);

view('user/locations/rest.show.view.php', [
    'place' => $place,
    'restid' => $restid,
    'user' => $user,
    'resturant_details' => $resturant_details,
    'resturant_display_details' => $resturant_display_details,
    'all_photos' => $all_photos,
    'menu_photos' => $menu_photos,
    'location_photos' => $location_photos,
    'reviews_with_names' => $reviews_with_names,
    'cuisines' => $cuisines
]);