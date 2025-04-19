<?php

// dd($_POST);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// dd($_POST);
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
$menu_item = $_POST['menu_item'];
// dd($menu_item);
$review = $_POST['review'];
$ratings = $_POST['ratings'];

$place_id = $place['locationid'];

// dd($review_type);

if($review_type == 'restaurant'){
    $db->query('INSERT INTO reviews (traid, review, locationid, ratings, reviewee_type, reviewee_type_id, reply, status) VALUES (:traid, :review, :locationid, :ratings, :reviewee_type, :reviewee_type_id, :reply, :status)', [
        'traid' => $traveller_id['userid'],
        'review' => $review,
        'locationid' => $place_id,
        'ratings' => $ratings,
        'reviewee_type' => 'restaurant',
        'reviewee_type_id' => $restid,
        'reply' => null,
        'status' => null
    ]);
}

if($review_type == 'menu'){
  $db->query('INSERT INTO cuisine_review (cuisineID, ratings, review, reply, status, created_at, traid) VALUES (:cuisineID, :ratings, :review, :reply, :status, :created_at, :traid)', [
    'cuisineID' => $menu_item,
    'ratings' => $ratings,
    'review' => $review,
    'reply' => null,
    'created_at' => date('Y-m-d H:i:s'),
    'traid' => $traveller_id,
    'status' => 'published'
  ]);
}
// dd($place_id);
$reviews_with_names = $db->query(
  'SELECT r.*, t.user_name AS traveller_name , t.profile AS traveller_profile
   FROM reviews r 
   JOIN travelers t ON r.traid = t.traid 
   WHERE r.status = :status AND r.locationid = :locationid',
  [
      'status' => 'flagged',
      'locationid' => $place_id
  ]
)->get();

// dd($reviews_with_names);
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
// If you want indexed array:
$cuisines = array_values($cuisines);
// dd($cuisines);
// dd($reviews_with_names);

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

