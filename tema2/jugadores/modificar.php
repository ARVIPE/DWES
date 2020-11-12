<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h2>Modifica los datos de los jugadores</h2>

        <?php
        if (isset($_POST['buscar']) && preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni'])) {

            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');

            if (!$conex->connect_errno) {
                $result = $conex->query("SELECT * from jugadores where dni = '$_POST[dni]'");
            }

            $fila = $result->fetch_array();
            $array = explode(",", $fila['posicion']);
            ?>
            <form action="" method="post">
                <?php
                echo "Dni: " . "<input type='text' name='dni' value= '$_POST[dni]' readonly >";
                echo "</br>";
                echo "Nombre: " . "<input type='text' name='nombre' value='$fila[nombre]'>";
                echo "</br>";
                ?>
                  Posición: <select multiple="" name="posicion[]">
                    <option value="1" <?php if (in_array("Portero", $array)) echo "selected"; ?>>Portero</option>
                    <option value="2" <?php if (in_array("Defensa", $array)) echo "selected"; ?>>Defensa</option>
                    <option value="4" <?php if (in_array("Centrocampista", $array)) echo "selected"; ?>>Centrocampista</option>
                    <option value="8" <?php if (in_array("Delantero", $array)) echo "selected"; ?>>Delantero</option>
                </select>

                <?php
                echo "</br>";
                echo "</br>";
                ?>
                
                
                 Dorsal: <select name="dorsal">
                <?php foreach (range(1, 11) as $num): 
                    echo "<option value='$num'";
                if($fila['dorsal'] == $num){
                    echo 'selected';
                }
                echo ">". $num. "</option>";
                    
                endforeach; ?>
            </select>


    <?php
    echo "</br>";
    echo "Equipo: " . "<input type='text' name='equipo' value='$fila[equipo]' '>";
    echo "</br>";
    echo "Goles: " . "<input type='text' name='numgoles' value='$fila[numgoles]' '>";
    echo "</br>";

    ?>

                <input type="submit" name="guardar" value="Guardar datos">
            </form>
            <br>
            <br>
            <a href="modificar.php">Volver</a>
    <?php
} else {
    ?>  

            <form action="" method="post">
                Dni del jugador: <input type="text" name="dni">
                <br>
                <br>
                <input type="submit" name="buscar" value="Buscar">
                <br>

            </form>

            <br>
            <a href="menu.php">Volver al incio</a>
    <?php
}
?>

        <?php
        
         if (isset($_POST['guardar']) && preg_match('/^[A-Z]{1,50}/i', $_POST['nombre']) && preg_match('/^[A-Z]{1,50}$/i', $_POST['equipo']) && preg_match('/^\d/', $_POST['numgoles'])) {

              $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
              return $conex;
            
            $posicion = 0;

            $result = $conex->stmt_init();

            foreach ($_POST['posicion'] as $values) {   
                $posicion += $values;
                
            }

            $result->prepare("UPDATE jugadores SET nombre=?, posicion=?, dorsal=?, equipo=?, numgoles=? where dni= '$_POST[dni]'");
            $result->bind_param('sssss', $_POST['nombre'], $posicion, $_POST['dorsal'], $_POST['equipo'], $_POST['numgoles']);
            $result->execute();
            $result->close();
            
           
        
        
        ?>

            
            
            <?php
           
         }
         ?>

    </body>
</html>