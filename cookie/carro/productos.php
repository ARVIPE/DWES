<?php


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. productos.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Listado de productos</h1>
            </div>
            <div id="cesta">
                <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <hr />
                <?php
                
                
                ?>
                <form action="" method="POST">
                    <input type="submit" name="vaciar" value="Vaciar Cesta" >
                </form>
                <form action="cesta.php" method="POST">
                    <input type="submit" name="comprar" value="Comprar" >
                </form>
                
            </div>
            <div id="productos">
                <?php
                

                ?>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir ">
                </form>
             
                <p class='error'>  </p>
                
            </div>
            
            
            
        </div>
    
    
    
    
    
    
</body>
</html>

