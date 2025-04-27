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

    public static function i_getAllPlaces(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'place\'')->get();
    }

    public static function i_getSelectedLocationDetails($selectedPlaces, $placeholders) {
        $db = App::resolve(Database::class);

        return $db->query("
            SELECT * 
            FROM locations 
            WHERE locationID IN ($placeholders)
        ", $selectedPlaces)->get();
    }

    public static function i_getStayLocations(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'accommodation\'')->get();
    }

    public static function i_getRestLocations(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'restaurant\'')->get();
    }

    public static function i_getPlaceLocations(){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'place\'')->get();
    }

    public static function i_getPlaceLocationsUserID($place_LocationIDs){
        if (empty($place_LocationIDs)) {
            return []; // Return empty array if no IDs provided
        }
    
        $db = App::resolve(Database::class);
        $placeholders = implode(',', array_fill(0, count($place_LocationIDs), '?'));
        
        return $db->query("
            SELECT locationid, display_name, userid, location_type FROM locations WHERE locationid IN ($placeholders)
        ", $place_LocationIDs)->get();
    }

    public static function i_getStayRestLocationsUserID($stay_rest_LocationIDs){
        $db = App::resolve(Database::class);

        $placeholders = implode(',', array_fill(0, count($stay_rest_LocationIDs), '?'));

        return $db->query("
            SELECT locationid, display_name, userid, location_type FROM locations WHERE locationid IN ($placeholders)
        ", $stay_rest_LocationIDs)->get();
    }

    public static function i_getLocationsWithinRadius($centerLat, $centerLon, $radiusKm = 20)
    {
        $db = App::resolve(Database::class);
            $radiusMeters = $radiusKm * 1000;
            
            return $db->query("
                SELECT 
                    *,
                    earth_distance(
                        ll_to_earth(:center_lat, :center_lon),
                        ll_to_earth(latitude, longitude)
                    ) / 1000 AS distance_km
                FROM 
                    locations
                WHERE 
                    latitude IS NOT NULL
                    AND longitude IS NOT NULL
                    AND earth_distance(
                        ll_to_earth(:center_lat, :center_lon),
                        ll_to_earth(latitude, longitude)
                    ) <= :radius
                ORDER BY 
                    distance_km ASC
            ", [
                'center_lat' => $centerLat,
                'center_lon' => $centerLon,
                'radius' => $radiusMeters
            ])->get();
    }

    public static function i_filterStayLocations($locations){
        $filteredLocations = [];
        foreach($locations as $location){
            if($location['location_type'] == 'accommodation'){
                $filteredLocations[] = $location;
            }
        }
        return $filteredLocations;
    }

    public static function i_filterRestLocations($locations){
        $filteredLocations = [];
        foreach($locations as $location){
            if($location['location_type'] == 'restaurant'){
                $filteredLocations[] = $location;
            }
        }
        return $filteredLocations;
    }

    public static function i_getStayLocationsByDistrictID($districtID){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'accommodation\' AND districtid = :districtID', ['districtID' => $districtID])->get();
    }

    public static function i_getRestLocationsByDistrictID($districtID){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM locations WHERE location_type = \'restaurant\' AND districtid = :districtID', ['districtID' => $districtID])->get();
    }
}
