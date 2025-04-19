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

}





