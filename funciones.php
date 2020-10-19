<?php

function crearMatriz($filas, $columnas){
    
    
    for($i = 0; $i < $filas; $i++){
        for($j = 0; $j < $columnas; $j++){
            $matriz[$i][$j] = rand(1,100); 
        }
    }
    return $matriz;
}


function mostrarMatriz($matriz){
    
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz[0]); $j++){
            echo $matriz[$i][$j];   
        }
        echo "<br>";
    }
}

function sumaFilas($matriz){
    $suma = 0;
    
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz[0]); $j++){
            $suma+=$matriz[$i][$j];
        }
        
        $sumamatriz[]=$suma;
        $suma = 0;
        
   }
   return $sumamatriz;
}


?>