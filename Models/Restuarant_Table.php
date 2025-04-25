<?php

namespace Models;

use Core\App;
use Core\Database;


class Restuarant_Table
{

    public static function n_findByName($resid, $name)
    {
        $db = App::resolve(Database::class);

        return $db->query(
            'select "tableid" from restaurant_table where "tablename"=:name and "resID"=:id ',
            [
                'id' => $resid,
                'name' => $name
               
            ]
        )->find();
    }

    public static function n_findByStatus($resid, $status)
    {
        $db = App::resolve(Database::class);

        return $db->query(
            'select * from restaurant_table where  "resID"=:id and "status"=:status',
            [
                'id' => $resid,
                'status' => $status
            ]
        )->get();
    }


    public static function n_updateTableAvailablility($tableid, $status)
    {
        $db = App::resolve(Database::class);

        return $db->query('UPDATE restaurant_table SET "status"=:status WHERE "tableid"=:tid', [
            'status' => $status,
            'tid' => $tableid

        ]);
    }


    public static function n_AddTable($resid, $tableprice, $tablepricetype, $seat, $tablename)
    {
        $db = App::resolve(Database::class);

        return $db->query(
            'INSERT INTO restaurant_table ("resID", "tableprice", "seatcapacity", "status", "tablepricetype", "tablename") 
     VALUES (:id, :price, :seat, :status, :pt, :tablename)',
            [
                'id' => $resid,
                'price' => ($tablepricetype === 'NoCharge') ? 0 : $tableprice,
                'seat' => $seat,
                'status' => 1,
                'pt' => $tablepricetype,
                'tablename' => $tablename
            ]
        );
    }

    public static function n_tableAvailability($tableid)
    {
        $db = App::resolve(Database::class);

        $result = $db->query(
            'SELECT "tableid" FROM restaurant_table WHERE "tableid" = :tid AND "status" = :status',
            [
                'tid' => $tableid,
                'status' => 1
            ]
        )->find();

        return $result !== false && $result !== null;
    }


    public static function n_UpdateTable($tablename, $tableprice, $seat, $tablepricetype, $tableid)
    {
        $db = App::resolve(Database::class);

        return $db->query('update restaurant_table set  "tablename"=:name, "tableprice"=:price,"seatcapacity"=:seat,tablepricetype=:pt where "tableid" = :id', [
            'name' => $tablename,
            'price' => $tableprice,
            'seat' => $seat,
            'pt' => $tablepricetype,
            'id' => $tableid
        ]);
    }
}
