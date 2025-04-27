<?php

namespace Models;
use Core\App;
use Core\Database;


class Rental{

    // public static function findByLicenseNo($license_number){
    //     $db = App::resolve(Database::class);
        
    //     return $db->query('select "license_number" from vehicle_details where "license_number"=:license_number',[
    //     'license_number'=>$license_number
        
    //     ])->find();

    // }
      public static function n_findWithDistrictId($id){
        $db = App::resolve(Database::class);
        
        return $db->query('select district  from  districts  where districtid=:id ', [
         'id' => $id
        ])->find();

      }

}





