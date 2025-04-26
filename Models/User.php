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
    
     public static function n_findTraid($email){
        $db = App::resolve(Database::class);
        
        return $db->query('select "userid" from users where "email"=:email and "role"=:role',[
        'email'=>$email,
        'role'=>'traveler'
        ])->find();
    }

    public static function i_getUserID($email){
        $db = App::resolve(Database::class);
        
        return $db->query('select "userid" from users where "email"=:email', [
        'email'=>$email
        ])->find();
    }



}

