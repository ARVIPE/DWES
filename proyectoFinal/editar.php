<?php
require_once('CrudJuego.php');
require_once('datos/Juego.php');
$juego = new Juego();
$crud = new CrudJuego();

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;

$listaJuegos = $crud->buscarProducto($codigo);
?>



<html>
    <head>
        <title>editar</title>
    </head>
    <body>

        <a href="alquilados.php">Volver</a>
        <h1>Editar juego</h1>


        <?php foreach ($listaJuegos as $juego) { ?>
        <table>
            <tr>
                <td>
                    <form action="administrarJuego.php?codigo=<?php echo $juego->codigo  ?>" method="post">
                        Nombre:<input type="text" name= "nombre" value=' <?php echo $juego->nombre_juego; ?>'></br>
                        Consola:<input type="text" name="consola" value="<?php echo $juego->nombre_consola; ?>"></br>
                        Año:<input type="number" name="anno" value="<?php echo $juego->anno; ?>"></br>
                        Precio:<input type="number" name="precio" value="<?php echo $juego->precio; ?>"></br>
                        Descripción:<textarea name="descripcion"><?php echo $juego->descripcion; ?></textarea></br>
                        Imagen: <input type="file" name="foto">
                        <input type="submit" name="editar" value="Editar">
                    </form>
                </td>
                <td>
                    <img src="<?php echo $juego->imagen; ?>" width="200px" height="240px"/>
                </td>
            </tr>
        </table>
           
        <?php } ?>

    </body>
</html>
