
<form action="" method="POST">
    
    <input type="text" name="filas" value="">
    <input type="text" name="columnas" value="">
    <input type="submit" name="enviar" value="Enviar">
    
</form>

<?php

require_once 'funciones.php';
if(isset($_POST["enviar"])){
    
    $matriz=crearMatriz($_POST['filas'], $_POST['columnas']);
    mostrarMatriz($matriz);
    
    $sumaFilas=sumafilas($matriz);
    
    foreach($sumaFilas as $valor){
        echo $valor;
        echo "<br>";
    }
    
    $sumaColumnas=sumacolumnas($matriz);
    
    foreach($sumaColumnas as $valor){
        echo $valor;
        echo "<br>";
    }
    
    $sumaFilasyColumnas=sumaFilasyColumnas($matriz);
    
    foreach($sumaFilasyColumnas as $valor){
        echo $valor;
        echo "<br>";
    }
    
    $sumaDiagonal=sumadiagonal($matriz);
    
    echo end( $sumaDiagonal );
    
    
    $tra=traspuesta($matriz);
    mostrarMatriz($tra);
    
    
}






?>