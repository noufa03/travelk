<?php

namespace Models;
use Core\App;
use Core\Database;


class Hotel_Reviews{

  public static function i_getReviews($stayid){
    $db = App::resolve(Database::class);

    return $db->query('SELECT * FROM accommodation_reviews r
    WHERE r."accid" = :accid', [
      'accid' => $stayid
    ])->get();
  }
  public static function i_getReviewWithNames($id){
    $db = App::resolve(Database::class);

    return $db->query(
        'SELECT r.*, t.user_name AS traveller_name , t.profile AS traveller_profile
        FROM accommodation_reviews r 
        LEFT JOIN travelers t ON r."userid" = t."traid" 
        WHERE r.status = :status AND r."accid" = :accid',
        [
          'status' => 'visible',
          'accid' => $id,
        ])->get();
  }
} 
