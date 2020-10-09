<?php

$array = array("Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa");

echo "Contiene", count($array), "elementos";

echo "<br>";

foreach ($array as $listado){
    echo "<ul>";
    echo "<li>", $listado, "</li>"; 
    echo "</ul>";
}




?>