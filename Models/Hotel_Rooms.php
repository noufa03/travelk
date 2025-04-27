<?php

namespace Models;

use Core\App;
use Core\Database;

class Hotel_Rooms{
    
    public static function i_getRoomDetails($stayid){
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM accommodation_rooms WHERE "accid" = :accid', [
            'accid' => $stayid
        ])->find();
    }
}
