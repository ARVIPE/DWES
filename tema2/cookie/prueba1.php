<?php

setcookie("nombre", "Arturo");


if(isset($_COOKIE['nombre'])){
    
    echo "Nombre de la cookie:".$_COOKIE['nombre'];
}



?>

