<?php


$matriz["fill"]["coll"] = 1;
$matriz["fill"]["coll"] = 2;
$matriz["fill"]["coll"] = 3;
$matriz["fill"]["coll"] = 4;
$matriz["fill"]["coll"] = 5;
$matriz["fill"]["coll"] = 6;
$matriz["fill"]["coll"] = 7;
$matriz["fill"]["coll"] = 8;
$matriz["fill"]["coll"] = 9;

foreach($matriz as $indfila=>$fila){
    echo "<tr>";
    foreach($fila as $indcol => $value){
        echo "<td>$value</td>";
    }
    echo "</tr>";
}


?>

