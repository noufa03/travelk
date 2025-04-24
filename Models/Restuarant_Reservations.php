<?php

namespace Models;

use Core\App;
use Core\Database;


class Restuarant_Reservations
{

    public static function n_reservationComplete($reservationid)
    {
        $db = App::resolve(Database::class);

        return $db->query('UPDATE tablereservations SET "reservationstatus" = :status WHERE "reservationid" = :id', [
            'status' => 'completed',
            'id' => $reservationid
        ]);
    }
}
