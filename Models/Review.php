<?php

namespace Models;

use Core\App;
use Core\Database;

class Review{
    public static function i_getReviewWithNames($locationID){
        $db = App::resolve(Database::class);

        return $db->query(
            'SELECT r.*, t.user_name AS traveller_name , t.profile AS traveller_profile
            FROM reviews r 
            JOIN travelers t ON r.traid = t.traid 
            WHERE r.status = :status AND r.locationid = :locationid',
            [
              'status' => 'flagged',
              'locationid' => $locationID
            ])->get();
    }

    public static function i_getCuisineReviewWithNames($restid){
        $db = App::resolve(Database::class);

        return $db->query('
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
    }

    public static function i_insertReview($data){
        $db = App::resolve(Database::class);

        return $db->query('INSERT INTO reviews (traid, review, locationid, ratings, reviewee_type, reviewee_type_id, reply, status) VALUES (:traid, :review, :locationid, :ratings, :reviewee_type, :reviewee_type_id, :reply, :status)', $data)->get();
    }

    public static function i_insertCuisineReview($data){
        $db = App::resolve(Database::class);

        return $db->query('INSERT INTO cuisine_review ("cuisineID", ratings, review, reply, status, traid) VALUES (:cuisineID, :ratings, :review, :reply, :status, :traid)', $data)->get();
    }

}