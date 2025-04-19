<?php

namespace Models;
use Core\App;
use Core\Database;


class User{

    public static function findByEmail($email){
        $db = App::resolve(Database::class);
        
        return $db->query('select * from users where "email"=:email', [
        'email'=>$email
        ])->find();
    }

}

