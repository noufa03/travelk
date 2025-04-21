<?php

namespace Models;

use Core\App;
use Core\Database;

class Location{
    public static function i_findBySearchTerm($searchTerm){
        $db = App::resolve(Database::class);

        return $db->query(
          "SELECT 
              *
          FROM 
              locations l
          LEFT JOIN 
              places p ON l.locationID = p.locationID
          WHERE 
              (l.display_name LIKE :searchTerm 
              OR l.street_address LIKE :searchTerm 
              OR l.city LIKE :searchTerm 
              OR p.key_words LIKE :searchTerm)",
          ['searchTerm' => $searchTerm])->get();
    }

    public static function i_getAllLocations(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations')->get();
    } 

    public static function i_getLocationByUserID($UserID){
        $db = App::resolve(Database::class);

        return $db->query(
            'SELECT * FROM locations WHERE "locationid" = :id', 
            ['id' => $UserID]
        )->find();
    }
}
