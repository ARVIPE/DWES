
<form action="" method="POST">
    
    <input type="text" name="filas" value="">
    <input type="text" name="columnas" value="">
    <input type="submit" name="enviar" value="Enviar">
    
</form>

<?php

require_once 'funciones.php';
if(isset($_POST["enviar"])){
    
    $matriz=crearMatriz($_POST['$filas'], $_POST['$columnas']);
    mostrarMatriz($matriz);
    
    $sumamatriz=sumafilas($matriz);
    
    foreach($sumamatriz as $valor){
        echo $valor;
    }
    
}






?>