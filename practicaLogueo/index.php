<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <?php
    session_start();
    if (isset($_COOKIE['intentos']) && ($_COOKIE['intentos']) == 0) {
        header('location: baneado.php');
    } else {
        setcookie("intentos", 3);
    }



    if (isset($_POST['entrar'])) {

        try {
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
            $result = $conex->query("SELECT * from perfil_usuario where nombre='$_POST[usuario]' and pass='" . md5($_POST["contraseña"]) . "'");

            if ($result->rowCount()) {



                while ($obj = $result->fetch(PDO:: FETCH_OBJ)) {
                    $_SESSION['nombre'] = $obj->nombre;
                    $_SESSION['apellidos'] = $obj->apellidos;
                    $_SESSION['direccion'] = $obj->direccion;
                    $_SESSION['localidad'] = $obj->localidad;
                    $_SESSION['color_letra'] = $obj->color_letra;
                    $_SESSION['color_fondo'] = $obj->color_fondo;
                    $_SESSION['tipo_letra'] = $obj->tipo_letra;
                    $_SESSION['tam_letra'] = $obj->tam_letra;
                }
                $_SESSION['nombre'] = $_POST['nombre'];
                header('location: inicio.php');
            } else {

                $intentos = $_COOKIE["intentos"] - 1;
                setcookie("intentos", $intentos);
                echo "Te quedan " . $intentos . " intentos";


                if ($intentos == 0) {
                    header('location: baneado.php');
                }
            }

            if (isset($_POST['registrar'])) {

                header('location: registro.php');
            }

            $error = $conex->errorInfo();
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); // error de php
            echo 'Error:' . $exc->getMessage(); // error del servidor de bd
        }
    }
    ?>

    <body>
        <div id='login'>
            <form action='' method='post'>
                <fieldset >
                    <legend>Login</legend>
                    <div class='campo'>
                        <label for='usuario'>Usuario:</label><br/>
                        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <label for='contraseña' >Contraseña:</label><br/>
                        <input type='password' name='contraseña' id='contraseña' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <input type='submit' name='entrar' value='entrar' />
                        <input type='submit' name='registrar' value='registrar' />
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>
