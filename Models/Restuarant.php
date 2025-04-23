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
    
      public static function n_findWithDistrictId($id){
        $db = App::resolve(Database::class);
        
        return $db->query('select *  from restaurants r left join locations l on l."userid"=r."resID" where r."resID"=:id', [
         'id' => $id
        ])->find();

    }
    
    
}





