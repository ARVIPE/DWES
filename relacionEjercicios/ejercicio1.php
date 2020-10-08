<?php

    
    $year = 2020;
    
    if ($year % 4 == 0){
         echo "es año bisiesto!";
         return;
    }else{
        echo "no es año bisiesto!"; 
        return;
    }
    if($year % 100 == 0){
        echo "es año bisiesto!";
        return;
    }else{
        echo "no es año bisiesto!";
        return;
    }
    if($year % 400 == 0){
        echo "es año bisiesto!";
        return;
    }else{
        echo "no es año bisiesto!"; 
        return;
    }

    
    

?>