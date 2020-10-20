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
    
    echo "<table border=1>";
    for($i = 0; $i < count($matriz); $i++){
        echo "<tr>";
        for($j = 0; $j < count($matriz[0]); $j++){
            
            echo "<td>";
            echo $matriz[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
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
   echo "La suma de cada una de las filas: <br>";
   return ($sumamatriz);
 
}

echo "<br>";

function sumaColumnas($matriz){
    $suma = 0;
    
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz[0]); $j++){
            $suma+=$matriz[$j][$i];
        }
        
        $sumamatriz[]=$suma;
        $suma = 0;
        
   }
   echo "La suma de cada una de las columnas: <br>";
   return $sumamatriz;
}

function sumaFilasyColumnas($matriz){
    $suma = 0;
    
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz[0]); $j++){
            $suma+=$matriz[$i][$j] + $matriz[$j][$i];
        }
        
        $sumamatriz[]=$suma;
        $suma = 0;
        
   }
   echo "La suma de cada una de las filas y columnas: <br>";
   return $sumamatriz;
}

function sumaDiagonal($matriz){
    $suma = 0;
    
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz[0]); $j++){
             if($i==$j){
                    $suma+=$matriz[$i][$j];
                }
        }
        
        $sumamatriz[]=$suma;
        
   }
   echo "La suma de la diagonal es: <br>";
   return $sumamatriz;
}

function traspuesta ($matriz){
    for ($i = 0; $i < count($matriz); $i++) {
     for ($j = 0; $j < count($matriz[0]); $j++) {
         $traspuesta[$j][$i]=$matriz[$i][$j];
        }   
    }
    return $traspuesta;
}



?>