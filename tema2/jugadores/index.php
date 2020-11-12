<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            Nombre: <input type="text" value="" name="nombre"/>
            </br>
            DNI: <input type="text" value="" name="dni"/>
            </br>
            Dorsal: 
            <select name="dorsal">
                <?php foreach (range(1, 11) as $num): ?>
                    <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
                <?php endforeach; ?>
            </select>
            </br>
            Posicion:
            </br>
            <select multiple="" name="posicion">

                <option>Portero</option>

                <option>Defensa</option>

                <option>Centrocampista</option>

                <option>Delantero</option>

            </select>
            </br>
            Equipo: <input type="text" value="" name="equipo"/>
            </br>
            Número de goles: <input type="text" value="" name="goles"/>
            </br>

            <input type="submit" name="enviar" value="enviar"/>

            <a href="menu.php">Volver</a>
        </form>

        <?php
// Create connection
        $conn = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected successfully";
        
        if(isset($_POST['enviar']) && preg_match('/^[A-Z]{1,50}/i', $_POST['nombre']) && preg_match('/^[\d]{8}[A-Z]{1}$/', $_POST['dni']) && preg_match('/^[A-Z]{1,50}/i', $_POST['equipo']) && preg_match('/^\d/', $_POST['numgoles'])){

            $sql = "INSERT INTO jugadores (dni, nombre, dorsal, posicion, equipo, numgoles) VALUES ('$_POST[dni]', '$_POST[nombre]', '$_POST[dorsal]', '$_POST[posicion]', '$_POST[equipo]', '$_POST[goles]')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        ?>






    </body>
</html>
