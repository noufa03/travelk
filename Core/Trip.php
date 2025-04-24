<?php

namespace Core;

class Trip
{
  public static function getTotalExpenceForStayAndRest($selectedRestPrices, $selectedStayPrices)
  {
      $missingPrices = false;
      $total_budget = 0;
  
      // Process restaurants
      foreach ($selectedRestPrices as $price) {
          if ($price === null || $price == 0) {
              $missingPrices = true;
          } else {
              $total_budget += (int)$price;
          }
      }
  
      // Process stays
      foreach ($selectedStayPrices as $price) {
          if ($price === null || $price == 0) {
              $missingPrices = true;
          } else {
              $total_budget += (int)$price;
          }
      }
  
      if ($missingPrices) {
          $message = "Some places do not have a valid price (0 or not added). They are excluded from the total budget.";
      }else{
          $message = null;
      }
  
      return [$total_budget, $message];
  }
  
  public static function checkBudget($budget, $selectedRestPrices, $selectedStayPrices)
  {
      $total_budget = self::getTotalExpenceForStayAndRest($selectedRestPrices, $selectedStayPrices)[0];
  
      if ($budget < $total_budget) {
          return true; // Budget is less than needed
      }
  
      return false;
  }
  
}