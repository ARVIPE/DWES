<?php
echo "<table border=1>"; 
$num = 0;
$suma = 0;
     for($i = 0; $i<=200; $i++){
         $num = $num + 1;
         if($num % 2 == 0){
            $suma = $suma + $num;
         }
 }
    echo "La sumatoria es: $suma <br>";


?> 