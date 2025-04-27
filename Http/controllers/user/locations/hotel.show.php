<?php

use Models\Location;
// use Models\Restuarant;
// use Models\Review;
use Models\Hotel;
use Models\Hotel_Package;
use Models\Hotel_Rooms;
use Models\Hotel_Reviews;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $restid;
}

$place = Location::i_getLocationByUserID($id);

$staytid = $place['userid'];
// dd($staytid);
$hotel_details = Hotel::i_getBasicDetails($staytid);
$hotel_listing_details = Hotel_Package::i_getListingDetails($staytid);
$hotel_room_details = Hotel_Rooms::i_getRoomDetails($staytid);
$hotel_reviews = Hotel_Reviews::i_getReviews($staytid);




$reviews_with_names = Hotel_Reviews::i_getReviewWithNames($id);

foreach($reviews_with_names as &$review){
  if($review['traveller_profile'] == NULL){
    $review['traveller_profile'] = '/assets/uploads/profiles/profile_placeholder.jpg';
  }
}
dd([
  // 'place' => $place,
  // 'hotel_details' => $hotel_details,
  // 'hotel_listing_details' => $hotel_listing_details,
  // 'hotel_room_details' => $hotel_room_details,
  'hotel_reviews' => $hotel_reviews,
  'reviews_with_names' => $reviews_with_names
]);


$hotel_path = extractResturantPath($place['photos']);

$location_files = getDirectoryFiles($hotel_path, 'locations');
// $menu_files = getDirectoryFiles($hotel_path, 'menus');

// $all_photos = array_map(function($file) use ($hotel_path) {
//     return $hotel_path . $file;
// }, array_merge($location_files, $menu_files));

// $menu_photos = array_map(function($file) use ($hotel_path) {
//     return $hotel_path . $file;
// }, $menu_files);

// $location_photos = array_map(function($file) use ($hotel_path) {
//     return $hotel_path . $file;
// }, $location_files);


// $reviews_with_names = Review::i_getReviewWithNames($id);

// foreach($reviews_with_names as &$review){
//     if($review['traveller_profile'] == NULL){
//         $review['traveller_profile'] = '/assets/uploads/profiles/profile_placeholder.jpg';
//     }
// }

// $cuisinesRaw = Review::i_getCuisineReviewWithNames($restid);

// $cuisines = [];

// foreach ($cuisinesRaw as $row) {
//     $cid = $row['cuisineID'];

//     if (!isset($cuisines[$cid])) {
//         $cuisines[$cid] = [
//             'cuisineID' => $cid,
//             'name' => $row['cuisine_name'], // or other fields from `cuisine` table
//             'cuisine_type' => $row['cuisine_type'],
//             'description' => $row['description'] ?? '',
//             'photo' => $row['photo'] ?? '',
//             'sizes' => [],
//             'flagged_reviews' => []
//         ];
//     }

//     if (!empty($row['sizeID'])) {
//         $cuisines[$cid]['sizes'][] = [
//             'sizeID' => $row['sizeID'],
//             'size' => $row['size'],
//             'price' => $row['price']
//         ];
//     }

//     if (!empty($row['reviewid'])) {
//         $cuisines[$cid]['flagged_reviews'][] = [
//             'reviewid' => $row['reviewid'],
//             'ratings' => $row['ratings'],
//             'review' => $row['review'],
//             'traid' => $row['traid'],
//             'user_name' => $row['user_name'],
//             'profile' => $row['profile'] ??  '/assets/uploads/profiles/profile_placeholder.jpg',
//             'status' => $row['status']
//         ];
//     }
// }

// if(isset($_SESSION['user'])){
//     $user = $_SESSION['user'];
// }else{
//     $user = null;
// }

// $cuisines = array_values($cuisines);

view('user/locations/hotel.show.view.php', [
  'stayid' => $staytid,
  'hotel_details' => $hotel_details,
  'hotel_listing_details' => $hotel_listing_details,
  'hotel_room_details' => $hotel_room_details,
  'hotel_reviews' => $hotel_reviews
    // 'place' => $place,
    // 'restid' => $restid,
    // 'user' => $user,
    // 'resturant_details' => $resturant_details,
    // 'resturant_display_details' => $resturant_display_details,
    // 'all_photos' => $all_photos,
    // 'menu_photos' => $menu_photos,
    // 'location_photos' => $location_photos,
    // 'reviews_with_names' => $reviews_with_names,
    // 'cuisines' => $cuisines
]);
