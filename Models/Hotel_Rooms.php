<?php

namespace Models;

use Core\App;
use Core\Database;

class Hotel_Rooms{
    public static function i_getRoomMinPriceByAccID($accID){
        $db = App::resolve(Database::class);

        $minPrice = $db->query("
            SELECT MIN(ar.price_per_night) as min_price
            FROM accommodation a
            JOIN accommodation_rooms ar ON a.accid = ar.accid
            WHERE a.accid = :accID
        ", [
            'accID' => $accID
        ])->get();

        return $minPrice;

    }
}
