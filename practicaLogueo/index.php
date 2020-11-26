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

            if (isset($_COOKIE['login'])) {
                if ($_COOKIE['login'] > 1) {
                    $intentos = $_COOKIE['login'] - 1;
                    echo 'Te quedan ' . $intentos . ' intentos';
                    setcookie('login', $intentos);
                } else {
                    echo 'Has sido baneado';
                    header("Location: baneado.php");
                }
            } else {
                setcookie('login', 3);
            }
            

            if (isset($_POST['entrar']) && (!empty($_POST['usuario'])) && (!empty($_POST['contraseña']))) {
                $result = $conex->query("SELECT * from perfil_usuario where pass='" . md5($_POST['contraseña']) . "' and nombre='".$_POST[usuario]."'");
                
                if($result->rowCount()){
                     $_SESSION['nombre'] = $_POST['usuario'];
           
                    header("Location: inicio.php");
                }
            }
            
            
            if(isset($_POST['registrar'])){
                
                header("Location: registro.php");
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
