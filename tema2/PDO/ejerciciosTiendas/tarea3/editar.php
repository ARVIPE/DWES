<html>
    <head>
        <title>title</title>
    </head>
    <body>


        <?php
        try {
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

            $error = $conex->errorInfo();
            echo $error[2];

            $productos = $conex->query("SELECT * from producto where cod='$_POST[editar]'");
            while ($nom = $productos->fetch(PDO::FETCH_ASSOC)) {
               
                 echo '<form method="POST" action="">';
                 echo "Código: <input type='text' name='cod' value=".$nom['cod']." readonly> <br>";   
                 echo "Nombre: <input type='text' name='nombre' value=".$nom['nombre']."> <br>";
                 echo "Nombre_corto: <input type='text' name='nombre_corto' value=".$nom['nombre_corto']."> <br>";
                 echo "Descripción: <textarea rows='15' cols='100' type='text' name='descripcion'>".$nom['descripcion']."</textarea><br>";
                 echo "Precio: <input type='text' name='nombre_corto' value=".$nom['PVP']."> <br>";
                 echo '</form>';?>
                

                   
           

                    <input type="submit" name="actualizar" value="actualizar"> <br>
                    <input type="submit" name="cancelar" value="cancelar"> <br>
               

                <?php
            }
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString(); // error de php
            echo 'Error:' . $exc->getMessage(); // error del servidor de bd
        }
        ?>



    </body>
</html>
