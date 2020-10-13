<?php

$estadios_de_futbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");

echo "<table border=1>";
foreach ($estadios_de_futbol as $equipo => $estadio){
    echo "<tr>";
    echo "<td>",$equipo,"</td>";
    echo "<td>",$estadio,"</td>";
    echo "<tr>";
}
$estadios_de_futbol["Real Madrid"] = "";

echo "<ol>";
foreach ($estadios_de_futbol as $equipo => $estadio){
    echo "<li>", $equipo,"\n", $estadio, "</li>"; 
}
echo "</ol>";


?>
