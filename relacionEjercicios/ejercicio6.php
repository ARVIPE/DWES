<?php
$numWhile = 1;
$sumaWhile = 0;
$numFor = 0;
$sumaFor = 0;
$numDoWhile = 0;
$sumaDoWhile = 0;

 while ($numWhile <=100) {
      $sumaWhile = $sumaWhile + $numWhile;
      $numWhile = $numWhile + 1;
   
   
    }
     echo "La sumatoria es: $sumaWhile <br>";
     
 for($i = 0; $i<=100; $i++){
     $sumaFor = $sumaFor + $numFor;
      $numFor = $numFor + 1;
 }
    echo "La sumatoria es: $sumaFor <br>";
    
do{
     $sumaDoWhile = $sumaDoWhile + $numDoWhile;
     $numDoWhile = $numDoWhile + 1;
    
}while($numDoWhile <= 100);

    echo "La sumatoria es: $sumaDoWhile";

   
   
?>