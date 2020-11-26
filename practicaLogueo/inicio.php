<html>
    <head>
        <title>title</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        session_start();

        echo "Hola " . $_SESSION['nombre'];
        ?>

        <?php
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);



            $error = $conex->errorInfo();
            echo $error[2];


            $result = $conex->query("SELECT color_letra from perfil_usuario where nombre='" . $_SESSION['nombre'] . "'");
            
            
            
            if (mysql_result($result) == "red") {
                echo "holaasadasda";
                ?><h2 class="rojo">Bienvenido a nuestra web</h2><?php
            }
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>




        <a href="logoff.php" name="salir">Salir</a>
    </body>
</html>
