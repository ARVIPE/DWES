<?php
try {
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

    session_name();
    session_start();


    $error = $conex->errorInfo();
    echo $error[2];
    $productos = $conex->query('SELECT * from producto');
} catch (PDOException $exc) {
    echo $exc->getTraceAsString(); // error de php
    echo 'Error:' . $exc->getMessage(); // error del servidor de bd
}
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
                if (isset($_POST['añadir'])) {


                    if ($_SESSION['cesta'][$_POST['añadir']]) {

                        $cantidad = $_SESSION['cesta'][$_POST['añadir']]['cantidad'];
                        $cantidad++;
                    } else {

                        $cantidad = 1;
                    }

                    $datos = array('nombre' => $_POST['nombre'], 'descripcion' => $_POST['descripcion'], 'precio' => $_POST['precio'], 'cantidad' => $cantidad);
                    $_SESSION['cesta'][$_POST['añadir']] = $datos;
                }

                if (isset($_SESSION['cesta'])) {
                    foreach ($_SESSION['cesta'] as $key => $value) {
                        echo $key . "x" . $value["cantidad"] . "</br>";
                    }
                }
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
$result = $conex->query("SELECT * FROM producto");

while ($nombre = $result->fetch()) {
    ?>

                    <form action="" method="post">
                        <button type = 'submit' name ='añadir' value ="<?php echo $nombre['cod'] ?>" >Añadir</button>
                        <input type = "hidden" name = "descripcion" value = "<?php echo $nombre['descripcion'] ?>" >
                        <input name = "nombre" value = "<?php echo $nombre['nombre_corto']; ?>">

                        <input name = "precio" value = "<?php echo $nombre['PVP']; ?>">

                    </form>


    <?php
}
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

