<?php

echo "<table border=1>"; 
foreach ($_SERVER as $nombre => $valor) {
    echo "<tr>";
    echo "<td>", $nombre, "</td>";
    echo "<td>", $valor, "</td>"; 
    echo "</tr>";

}

?>