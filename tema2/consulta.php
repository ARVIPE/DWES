<?php

 $conec = new mysqli('localhost','dwes','abc123.','dwes');
 $result=$conec->query("SELECT * FROM producto");
 
 if(!$conec->errno){
     if($result->num_rows){
         while($fila=$result->fetch_object()){
             echo "Codigo: ".$fila->cod."<br>";
             echo "Nombre: ".$fila->nombre_corto."<br>";
             echo "PVP: ".$fila->PVP."<br>";
         }
     }
 }



?>
