<?php

namespace Models;

use Core\App;
use Core\Database;


class Restuarant_Table
{

    public static function n_findByCategory($resid, $category)
    {
        $db = App::resolve(Database::class);

        return $db->query(
            'select "tableid" from restaurant_table where "category"=:cat and "resID"=:id and "status"=:status',
            [
                'id' => $resid,
                'cat' => $category,
                'status' => 1
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


    public static function n_AddTable($resid, $tableprice, $tablepricetype, $category, $customtable)
    {
        $db = App::resolve(Database::class);

        return $db->query('INSERT INTO  restaurant_table("resID","tableprice","category","status","tablepricetype") VALUES(:id,:price,:cat,:status,:pt)', [
            'id' => $resid,
            'price' => ($tablepricetype === 'NoCharge') ? 0 : $tableprice,
            'cat' => ($category === 'custom') ? 'custom:' . $customtable : $category,
            'status' => 1,
            'pt' => $tablepricetype,


        ]);
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
}
