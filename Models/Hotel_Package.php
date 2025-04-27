<?php

namespace Models;

use Core\App;
use Core\Database;

class Hotel_Package{
  public static function i_getPackageMinPriceByAccID($accID){
    $db = App::resolve(Database::class);

    $minPrice = $db->query("
        SELECT MIN(al.price) as min_price
        FROM accommodation a
        JOIN accommodation_listings al ON a.accid = al.accid
        WHERE a.accid = :accID
    ", [
        'accID' => $accID
    ])->get();

    return $minPrice;

    }

    public static function i_getListingDetails($stayid){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM accommodation_listings WHERE "accid" = :accid', [
            'accid' => $stayid
        ])->find();
    }
}