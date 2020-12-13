<?php
require_once('CrudJuego.php');
require_once('datos/Juego.php');
$juego = new Juego();
$crud = new CrudJuego();


$listaJuegos = $crud->mostrar();
?>

<html>
    <head>
        <title>Crud</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

        <div class="container-fluid">  
            <h2>Juegos Comares</h2>
            <h5>Bienvenido Admin</h5>
            <form action="cerrar.php" action="post">
                <input type="submit" name="cerrar" value="Cerrar sesion">   
            </form>
            <a href="loginAdmin.php">Listado de juegos &nbsp;</a>
            <a href="alquilados.php">Listado de juegos alquilados &nbsp;</a>
            <a href="alquilados.php">Listado de juegos alquilados &nbsp;</a>
            <a href="alquilados.php">Listado de juegos no alquilados &nbsp;</a>
            <a href="alquilados.php">Mis juegos alquilados</a>
            <br>
            <a href="añadir.php">Añadir juego &nbsp;</a>
            <a href="alquilados.php">Administrar juegos</a>

            <br> <br> 
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Carátula</th> 
                        <th scope="col">Nombre Juego</th>
                        <th scope="col">Nombre consola</th>
                        <th scope="col">Año</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaJuegos as $juego) { ?>
                        <tr>
                            <th><img src="<?php echo $juego->imagen; ?>" width="50px" height="70px"/></th>
                            <th><?php echo $juego->nombre_juego ?></th> 
                            <th><?php echo $juego->nombre_consola ?></th>
                            <th><?php echo $juego->anno ?></th>
                            <th><?php echo $juego->precio ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>



    </body>
</html>
