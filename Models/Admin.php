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
    

}

