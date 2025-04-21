<?php

namespace Models;
use Core\App;
use Core\Database;


class Restuarant{

    public static function findByRegno($regno){
        $db = App::resolve(Database::class);
        
        return $db->query('select "businessRegNo"  from restaurants where "businessRegNo"=:businessRegNo', [
         'businessRegNo' => $regno
        ])->find();

    }
    
      public static function n_findProfileByResID($id){
        $db = App::resolve(Database::class);
        
        return $db->query('select "profile"  from restaurant_details where "id"=:id', [
         'id' => $id
        ])->find();

    }

    public static function getBasicDetails($restid) {
        $db = App::resolve(Database::class);

        return $db->query('SELECT * FROM restaurants WHERE "resID" = :resID', [
            'resID' => $restid
        ])->find();
    }

    public static function getDisplayDetails($restid) {
        $db = App::resolve(Database::class);
        
        return $db->query('SELECT * FROM restaurant_details WHERE "id" = :id', [
            'id' => $restid
        ])->find();
    }

}





