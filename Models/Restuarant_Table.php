<?php

namespace Models;
use Core\App;
use Core\Database;


class Restuarant_Table{

    public static function n_findByCategory($resid,$category){
        $db = App::resolve(Database::class);
        
        return $db->query(
            'select "tableid" from restaurant_table where "category"=:cat and "resID"=:id',
            [
                'id' => $resid,
                'cat' => $category
            ]
        )->find();

    }

}





