<?php

namespace Models;

use Core\App;
use Core\Database;

class Cuisine{
    public static function i_getCuisineMinPriceByResID($resID){
        $db = App::resolve(Database::class);

        $minPrice = $db->query("
            SELECT MIN(cs.price) as min_price
            FROM cuisines c
            JOIN cuisinesizes cs ON c.cuisineID = cs.cuisineID
            WHERE c.resID = :resID
        ", [
            'resID' => $resID
        ])->get();

        return $minPrice;
    }
}
