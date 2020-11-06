<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action=" " method="post">
                    <?php
                    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                    $result = $conex->query('select * from jugadores');
                    if (!$conex->errno) {
                        if ($result->num_rows) {
                            while ($fila = $result->fetch_array()) {
                                echo "</br>". "Dni: " . $fila['dni'] .  "</br>" . "Nombre: " .$fila['nombre']."</br>". "Dorsal: " .$fila['dorsal']. "</br>"."Posición: ".$fila['posicion']. "</br>".  "Equipo: ".$fila['equipo']. "</br>" ."Numgoles: " .$fila['numgoles'] . "</br>";
                            }
                        }
                    } else {
                        echo 'No se ha podido acceder';
                    }
                    ?>
                <a href="menu.php">Volver</a>

            </form>
    </body>
</html>
