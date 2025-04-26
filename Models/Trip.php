<?php

namespace Models;

use Core\App;
use Core\Database;

class Trip{
  
    public static function i_createTrip(
        $userid,
        $country,
        $start_date,
        $end_date,
        $date_flexibility,
        $no_of_ppl,
        $age_gap,
        $t_budget,
        $currency,
        $place_ids,
        $stay_ids,
        $rest_ids
    ) {
        $db = App::resolve(Database::class);

        $query = "
            INSERT INTO trips (
                userid, create_date, create_time, start_date, end_date,
                date_flexibility, no_of_ppl, age_gap, t_budget, currency,
                country, place_ids, stay_ids, rest_ids, status
            ) VALUES (
                :userid, CURRENT_DATE, CURRENT_TIME, :start_date, :end_date,
                :date_flexibility, :no_of_ppl, :age_gap, :t_budget, :currency,
                :country, :place_ids, :stay_ids, :rest_ids, :status
            )
        ";

        $db->query($query, [
            'userid' => $userid,
            'start_date' => $start_date,          // Format: 'YYYY-MM-DD'
            'end_date' => $end_date,             // Format: 'YYYY-MM-DD'
            'date_flexibility' => $date_flexibility, // true/false
            'no_of_ppl' => $no_of_ppl,          // Integer
            'age_gap' => $age_gap,              // String (e.g., '20-30')
            't_budget' => $t_budget,            // Numeric (e.g., 5000.50)
            'currency' => $currency,            // String (e.g., 'USD')
            'country' => $country,              // String (e.g., 'Japan')
            'place_ids' => $place_ids,     // Convert array to JSON
            'stay_ids' => $stay_ids,      // Convert array to JSON
            'rest_ids' => $rest_ids,
            'status' => 'active'
        ]);
    }
}


