<html>
    <head>
        <title>title</title>
    </head>
    <body>


        <form action="" method="post">
            <select name="opciones" >

                <option>equipo</option>

                <option>dni</option>

                <option>posicion</option>

            </select>
            </br>
            Buscar: <input type="text" value="" name="buscar">
            <input type="submit" value="enviar" name="enviar">
            </br>
        </form>

        <?php
        if (isset($_POST['enviar'])) {
            // Create connection
            $conn = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            
            $variable = $_POST['opciones'];
            $buscar= $_POST['buscar'];
            
            $result = $conn->query("select * from jugadores where $variable = '$buscar'");
            if (!$conn->errno) {
                if ($result->num_rows) {
                    while ($fila = $result->fetch_array()) {
                        echo "</br>" . "Dni: " . $fila['dni'] . "</br>" . "Nombre: " . $fila['nombre'] . "</br>" . "Dorsal: " . $fila['dorsal'] . "</br>" . "Posición: " . $fila['posicion'] . "</br>" . "Equipo: " . $fila['equipo'] . "</br>" . "Numgoles: " . $fila['numgoles'] . "</br>";
                    }
                }
            } else {
                echo 'No se ha podido acceder';
            }
        }
        ?>


    </body>
</html>
