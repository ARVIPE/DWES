<?php

$array = array("Nombre" => "Pedro Torres", "Dirección" => "C/Mayor, 37", "Teléfono" => 123456789);
$array1 = array("Nombre" => "Manuel Eslava", "Dirección" => "C/Menor, 33", "Teléfono" => 987654321);
$array2 = array("Nombre" => "Maria Lukkaku", "Dirección" => "C/Isla Menores, 28", "Teléfono" => 632358911);


foreach($array as $nombre => $valor){
    echo "$nombre : $valor <br>";
}
    echo "<br>";
foreach($array1 as $nombre => $valor){
    echo "$nombre : $valor <br>";
   
}
    echo "<br>";
foreach($array2 as $nombre => $valor){
    echo "$nombre : $valor <br>";
}









?>