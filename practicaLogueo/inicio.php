<html>
    <head>
        <title>title</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        session_start();
        ?>

        <?php
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);



            $error = $conex->errorInfo();
            echo $error[2];


            $result = $conex->query("SELECT color_letra, color_fondo, tipo_letra, tam_letra from perfil_usuario where nombre='" . $_SESSION['nombre'] . "'");


            while ($fila = $result->fetch(PDO::FETCH_OBJ)) {

                if ($fila->tipo_letra == "Times New Roman") {
                     ?><body class="verdana"><?php
                    if ($fila->color_letra == "red") {
                        ?><label class="rojo"><?php echo "Hola ".$_SESSION['nombre']."</br>"; ?></label>
                        <label class="rojo">Bienvenido a nuestra web</label><?php
                    }

                    if ($fila->color_letra == "blue") {
                         ?><label class="azul"><?php echo "Hola ".$_SESSION['nombre']."</br>"; ?></label>
                        <label class="azul">Bienvenido a nuestra web</label><?php
                    }

                    if ($fila->color_fondo == "green") {
                        ?><body style="background-color:green;"><?php
                    }

                    if ($fila->color_fondo == "red") {
                        ?><body style="background-color:red;"><?php
                    }
                    ?><?php
                }
                
                  if ($fila->tipo_letra == "Verdana") {
                    ?><body class="verdana"><?php
                    if ($fila->color_letra == "red") {
                        ?><label class="rojo"><?php echo "Hola ".$_SESSION['nombre']."</br>"; ?></label>
                        <label class="rojo">Bienvenido a nuestra web</label><?php
                    }

                    if ($fila->color_letra == "blue") {
                         ?><label class="azul"><?php echo "Hola ".$_SESSION['nombre']."</br>"; ?></label>
                        <label class="azul">Bienvenido a nuestra web</label><?php
                    }

                    if ($fila->color_fondo == "green") {
                        ?><body style="background-color:green;"><?php
                    }

                    if ($fila->color_fondo == "red") {
                        ?><body style="background-color:red;"><?php
                    }
                    ?><?php
                }
                /**if ($fila->tam_letra == "red") {
                    ?><h2 class="rojo">Bienvenido a nuestra web</h2><?php
                }**/
            }
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>




        <a href="logoff.php" name="salir">Salir</a>
    </body>
</html>
