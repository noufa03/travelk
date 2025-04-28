<?php

namespace Models;
use Core\App;
use Core\Database;


class Hotel{

    public static function findByBusRegNo($business_reg_num){
        $db = App::resolve(Database::class);
        
        return $db->query('select "business_reg_num" from accommodation where "business_reg_num"=:business_reg_num',[
        'business_reg_num'=>$business_reg_num
        
        ])->find();

    }

    public static function i_getBasicDetails($stayid){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM accommodation WHERE "accid" = :accid', [
            'accid' => $stayid
        ])->find();
    }

    


    
    // public static function i_getHotelNames($hotel_ids){
    //     $db = App::resolve(Database::class);

    //     return $db->query('SELECT display_name FROM hotels WHERE hotelid IN (:hotel_ids)', ['hotel_ids' => $hotel_ids])->get();
    // }

}




