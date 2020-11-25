<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
    http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);



            $error = $conex->errorInfo();
            echo $error[2];

            if (isset($_POST['enviar']) && (!empty($_POST['usuario'])) && (!empty($_POST['clave']))) {
                $result = $conex->query("SELECT * from usuarios where contraseña='" . md5($_POST['clave']) . "' and usuario='$_POST[usuario]'");

                $obj = $result->fetch();
                if ($result->rowCount()) {

                    session_name();
                    session_start();

                    header("Location: productos.php");
                } else {

                    echo "Incorrecto";
                }
            }
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>

        <div id='login'>
            <form action='' method='post'>
                <fieldset >
                    <legend>Login</legend>
                    <div><span class='error'>	</span></div>
                    <div class='campo'>
                        <label for='usuario' >Usuario:</label><br/>
                        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <label for='clave' >Contraseña:</label><br/>
                        <input type='password' name='clave' id='clave' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <input type='submit' name='enviar' value='Enviar' />
                    </div>
                </fieldset>
            </form>
        </div>

        <?php ?>
    </body>
</html>



