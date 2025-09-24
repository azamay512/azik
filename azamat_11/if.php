<?php

$a = date("H");

if ($a < 12) {
    echo "Sog'ot 12:00 dan utgan" . "<br>";
} elseif($a > 12) {
    echo "sog'ot 12:00 ga yetmagan" . "<br>";
} else {
    echo "Xatolik yuz berdi" . "<br>";
}

 $h = date("H");

  if ($h < 12) {
     echo "Sog'ot 12:00 dan utgan" . "<br>";
     if ($h > 12) {
      echo "Sog'ot hali 12:00 dan utmagan" . "<br>";
     } 
  }

  $t = rand(1 , 10);
  
  if ($t < 5) {
    echo "5 dan baland" . "<br>";
  }  else {
    echo "5 dan kichik" . "<br>";
  }

  

  $car = 5;

   switch ($car) {
    case 1:
    case 2:   
     echo "fake";
        break;
       case 5:
       echo "true";
        break;
    default:
       echo "xato";
        break;
   }
 
 
?>