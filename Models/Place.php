<?php

namespace Models;

use Core\App;
use Core\Database;

class Place{
    public function i_getAllPlaces(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM places')->get();
    }

    public static function i_searchByKeywords($selectedKeywords) {
        $db = App::resolve(Database::class);

          // Build search terms
          $searchTerms = array_map(fn($keyword) => "%$keyword%", $selectedKeywords);
  
          // Search in description
          $descConditions = implode(' OR ', array_fill(0, count($selectedKeywords), "description ILIKE ?"));
          $descQuery = "SELECT * FROM places WHERE $descConditions";
          $placesDesc = $db->query($descQuery, $searchTerms)->get();
  
          // Search in key_words array
          $kwConditions = implode(' OR ', array_fill(0, count($selectedKeywords), "EXISTS (SELECT 1 FROM unnest(key_words) AS kw WHERE kw ILIKE ?)"));
          $kwQuery = "SELECT * FROM places WHERE $kwConditions";
          $placesKW = $db->query($kwQuery, $searchTerms)->get();
  
          return array_merge($placesDesc ?? [], $placesKW ?? []);
    }

    // public static function i_getPlaceNames($place_ids){
    //     $db = App::resolve(Database::class);

    //     return $db->query('SELECT display_name FROM places 
    //     LEFT JOIN locations l ON l."locationid"=p."locationid"
    //     WHERE placeid IN (:place_ids)', ['place_ids' => $place_ids])->get();
    // }
    

  }