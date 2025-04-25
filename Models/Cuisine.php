<?php

namespace Models;

use Core\App;
use Core\Database;

class Cuisine
{
    public static function i_getCuisineMinPriceByResID($resID)
    {
        $db = App::resolve(Database::class);

        $minPrice = $db->query("
            SELECT MIN(cs.price) as min_price
            FROM cuisine c
            JOIN cuisinesizes cs ON c.\"cuisineID\" = cs.\"cuisineID\"
            WHERE c.\"resID\" = :resID
        ", [
            'resID' => $resID
        ])->get();

        return $minPrice;
    }


    public static function n_findCuisineById($cuisineID)
    {
        $db = App::resolve(Database::class);
        return $db->query('select * from cuisine where "cuisineID" = :id', [
            'id' => $cuisineID
        ])->findOrFail();
    }
}
