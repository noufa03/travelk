<?php

namespace Models;
use Core\App;
use Core\Database;


class Restuarant_Faqs{

    public static function n_InsertFaqs($resid,$question,$answer){
        $db = App::resolve(Database::class);
        
        return $db->query('INSERT INTO restaurants_faqs("resID","question", "answer") VALUES(:id,:q, :a)', [
            'id' => $resid , 
            'q'=>$question,
            'a'=>$answer
        ]);


    }

}





