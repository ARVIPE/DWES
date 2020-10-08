<?php
echo "<table border=1>"; 
$num = 0;
$suma = 0;
     for($i = 0; $i<=100; $i++){
     $suma = $suma + pow($num, 2);
      $num = $num + 1;
 }
    echo "La sumatoria es: $suma <br>";


?> 