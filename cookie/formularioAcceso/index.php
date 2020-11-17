<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <form action="prueba-cookies.php" method="post">
            Usuario: <input type="text" name="usuario">
            <br>
            Clave: <input type="text" name="clave">
            <br>
            <input type="checkbox" name="guardar_clave" value="1">Recuerdame
            <br>
            <input type="hidden" name="cookiecreada" value"<?php $_COOKIE['nombre'] ?>">
            <br>
            <input type="submit" name="entrar" value="entrar">
        </form>
        
        <?php
        
        if(isset($_POST["entrar"]) && isset($_POST["guardar_clave"])){
            setcookie("nombre", $_POST['usuario']);
            setcookie("clave", $_POST['clave']);
            echo $_COOKIE["nombre"]."<br>";
            echo $_COOKIE["clave"];
            setcookie('ultimoAcceso', date('d-m-y h:i:s'), time()+3600);     
        }
        
        
        ?>

    </body>
</html>
