<?php

use Models\Location;
use Models\Restuarant;
use Models\Review;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $restid;
}

$place = Location::i_getLocationByUserID($id);

$restid = $place['userid'];

$resturant_details = Restuarant::getBasicDetails($restid);
$resturant_display_details = Restuarant::getDisplayDetails($restid);

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


$reviews_with_names = Review::i_getReviewWithNames($id);

foreach($reviews_with_names as &$review){
    if($review['traveller_profile'] == NULL){
        $review['traveller_profile'] = '/assets/uploads/profiles/profile_placeholder.jpg';
    }
}

$cuisinesRaw = Review::i_getCuisineReviewWithNames($restid);

$cuisines = [];

foreach ($cuisinesRaw as $row) {
    $cid = $row['cuisineID'];

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

    if (!empty($row['sizeID'])) {
        $cuisines[$cid]['sizes'][] = [
            'sizeID' => $row['sizeID'],
            'size' => $row['size'],
            'price' => $row['price']
        ];
    }

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

$cuisines = array_values($cuisines);

view('user/locations/hotel.show.view.php', [
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
