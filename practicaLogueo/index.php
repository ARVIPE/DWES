<html>
    <head>
        <title>login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        try {

            session_start();

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

            $error = $conex->errorInfo();
            echo $error[2];


            if (isset($_POST['entrar']) && (empty($_POST['usuario'])) && (empty($_POST['contraseña']))) {
                if (isset($_COOKIE['login'])) {
                    if ($_COOKIE['login'] > 1) {
                        $intentos = $_COOKIE['login'] - 1;
                        echo 'Te quedan '.$intentos.' intentos';
                        setcookie('login', $intentos); 
                    } else {
                        echo 'Has sido baneado';
                    }
                } else {
                    setcookie('login', 3); 
                    echo 'Te quedan 3 intentos';
                }
            }

       

            if (isset($_POST['entrar']) && (!empty($_POST['usuario'])) && (!empty($_POST['contraseña']))) {
                $result = $conex->query("SELECT * from perfil_usuario");
                $obj = $result->fetch();
                if ($_POST['usuario'] == $obj['nombre'] && md5($_POST['contraseña']) === $obj['pass']) {

                    header("Location: entrar.php");
                } else {
                    echo "Incorrecto";

                }
            }
            if (isset($_POST['registrar'])) {

                header("Location: registrar.php");
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
                    <div class='campo'>
                        <label for='usuario' >Usuario:</label><br/>
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
