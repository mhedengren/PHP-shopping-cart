<?php
function freeShipping($price){
      //Sets correct timezone.
      date_default_timezone_set ('Europe/Stockholm');
      $date = date("l");
      //If monday and price above 200kr, discount will apply.
      if ($date === "Monday" && $price >= 200) {
          $price = $price - 69;
          echo "<p class='free_shipping'>" . 'Fri frakt måndagar för alla beställningar över 200kr! (69kr).' . "</p>";
      }
      return $price;  
  }
?>