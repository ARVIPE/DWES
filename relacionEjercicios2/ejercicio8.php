<?php

$array = array(1,2,3,4,5,6,7,8,9,10);
$suma = 0;
$contador = 0;

foreach ($array as $listado => $valor){
    if($valor % 2 != 0){
    echo $valor;
    }else{
       $suma+=$valor;
       $contador++;
    }
}

echo "<br>";
echo "La media de los pares es:";
echo ($suma/$contador);





?>