<?php
session_start();
?>
<html>
    <head>
        <title>title</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            body{
                background-color: <?php echo $_SESSION['fondo']; ?>
            }


        </style>
    </head>
    <body>


        <form action="index.php" method="post">
            <button type="submit" name="volver">Volver</button>
        </form>

        <form action="logoff.php.php" method="post">     
            <button type="submit"  name="salir">Salir</button>
        </form>


    </body>
</html>
