<html>
    <head>
        <title>acceso correcto</title>
    </head>
    <body>
        
        <form action="index.php" method="post">
            <?php
            if(!empty($_POST["usuario"]) && !empty($_POST["clave"])){
                if (isset($_POST["entrar"])) {
                    setcookie("nombre", $_POST['usuario']);
                    setcookie("clave", $_POST['clave']);
                    setcookie('ultimoAcceso', date('d-m-y h:i:s'), time() + 3600 * 24 * 365);
                    
                    if(isset($_POST["guardar_clave"])){
                        setcookie('checkeo','checked');
                    }
                    
                }
            }


            if(isset($_COOKIE["nombre"]) && isset($_COOKIE["clave"]) && isset($_COOKIE["ultimoAcceso"])){

               echo "Hola ".$_COOKIE["nombre"].", su última visita fue el ".$_COOKIE["ultimoAcceso"];
            }

            ?>
            <input type="submit" name="volver" value="volver">
        </form>


    </body>
</html>
