<?php

namespace Models;
use Core\App;
use Core\Database;


class Rental{

    public static function findByLicenseNo($license_number){
        $db = App::resolve(Database::class);
        
        return $db->query('select "license_number" from drivers where "license_number"=:license_number',[
        'license_number'=>$license_number
        
        ])->find();

    }

}





