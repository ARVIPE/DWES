<?php

$array = array("Enero " => 9, "Febero" => 12, "Marzo" => 0, "Abril" => 17);

foreach ($array as $mes => $valor) {
     if($valor == 0){
         "<br>";
     }else{
      echo "$mes \n" ;
      echo "$valor<br>";   
     }
}






?>