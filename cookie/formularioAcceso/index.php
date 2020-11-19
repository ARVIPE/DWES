<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <?php
        try{

        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
        $conex = new PDO('mysql:host=localhost; dbname=cookie; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        
        $error = $conex->errorInfo();
        echo $error[2];

        if (isset($_POST['entrar']) && (!empty($_POST['usuario'])) && (!empty($_POST['clave']))) {
            $result = $conex->query("SELECT * from usuarios");
            $obj = $result->fetch();
            if($_POST['usuario'] == $obj['usuario'] && md5($_POST['clave']) === $obj['contraseña']){
                echo "Correcto";
            }else{
            echo "Incrorrecto";
            }
        }


        } catch (PDOException $exc) {

        echo $exc->getTraceAsString(); //error de php
        echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>


        <form action="prueba-cookies.php" method="post">
            Usuario: <input type="text" name="usuario" value="<?php if(isset($_POST["volver"]) && isset($_COOKIE["checkeo"]))echo $_COOKIE["nombre"]; ?>">
            <br>
            Clave: <input type="password" name="clave" value="<?php if(isset($_POST["volver"]) && isset($_COOKIE["checkeo"]))echo $_COOKIE["clave"]; ?>">
            <br>
            <input type="checkbox" name="guardar_clave" value="1">Recuerdame<br>
            <input type="submit" name="entrar" value="entrar">
        </form> 



    </body>
</html>
