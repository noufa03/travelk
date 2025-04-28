<?php

use Core\App;
use Core\Database;
use Models\Review;
$db = App::resolve(Database::class);

$place = json_decode($_POST['place'], true);
$restid = json_decode($_POST['restid'], true);
$user = json_decode($_POST['user'], true);
$resturant_details = json_decode($_POST['resturant_details'], true);
$resturant_display_details = json_decode($_POST['resturant_display_details'], true);
$all_photos = json_decode($_POST['all_photos'], true);
$menu_photos = json_decode($_POST['menu_photos'], true);
$location_photos = json_decode($_POST['location_photos'], true);

$traveller_id = $db->query('SELECT userid FROM users WHERE email = :email', ['email' => $user['email']])->find();

$review_type = $_POST['review_type'];
$cuisineID = (int)$_POST['menu_item'];
$review = $_POST['review'];
$ratings = $_POST['ratings'];
$place_id = $place['locationid'];

if($review_type == 'restaurant'){
  Review::i_insertReview([
    'traid' => $traveller_id['userid'],
    'review' => $review,
    'locationid' => $place_id,
    'ratings' => $ratings,
    'reviewee_type' => 'restaurant',  
    'reviewee_type_id' => $restid,
    'reply' => null,
    'status' => 'published'
  ]);
}

if($review_type == 'menu'){
  Review::i_insertCuisineReview([
    'cuisineID' => $cuisineID,
    'ratings' => $ratings,
    'review' => $review,
    'reply' => null,
    'status' => 'published',
    'traid' => $traveller_id['userid']
  ]);
}

$reviews_with_names = Review::i_getReviewWithNames($place_id);

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

$cuisines = array_values($cuisines);

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

