<?php
require_once('CrudJuego.php');
require_once('datos/Juego.php');
require_once('CrudAlquiler.php');

$juego = new Juego();
$crud = new CrudJuego();
$crudAlquiler = new CrudAlquiler();

session_start();

if (isset($_POST['cerrar'])) {
    if (!isset($_SESSION['nombre'])) {
        header("Location: index.php");
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}

if (isset($_POST['alquilar'])) {


    $fechaA = date("Y-n-d");
    

    $crudAlquiler->insertar(null, $_POST['alquilar'], $_SESSION['dni'], $fechaA, null);
    $crudAlquiler->cambiarAlquiler($_POST['alquilar']);
}


if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
} else {
    





    $listaJuegos = $crud->mostrar();
    ?>

    <html>
        <head>
            <title>Crud</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

            <style>      
                
                .img{
                    filter: grayscale(1);
                }
                
                .visibilidad{
                    display: none;
                }
                
            </style>

        </head>
        <body>

            <div class="container-fluid">  
                <h2>Juegos Comares</h2>
                <h5>Bienvenido <?php echo $_SESSION['nombre'] ?></h5>
               <form action="" method="post">
                    <input type="submit" name="cerrar" value="Cerrar sesion">   
                </form>
                <a href="juegosAlqui.php">Listado de juegos alquilados &nbsp;</a>
                <a href="juegosNoAlqui.php">Listado de juegos no alquilados &nbsp;</a>
                <a href="misJuegos.php">Mis juegos alquilados</a>
                </br>
                <a href="añadir.php">Añadir juego</a>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaJuegos as $juego) { ?>
                            <tr>
                                <th><?php if(($juego->alquilado)=="SI"){ ?> <a href="vistaDescripcion.php?Codigo=<?php echo $juego->codigo ?>"> <img class="img" src="<?php echo $juego->imagen; ?>" width="50px" height="70px"/><?php }else{ ?> <a href="vistaDescripcion.php?Codigo=<?php echo $juego->codigo ?>"> <img src="<?php echo $juego->imagen; ?>" width="50px" height="70px"/><?php } ?></th>
                                <th><?php echo $juego->nombre_juego ?></th> 
                                <th><?php echo $juego->nombre_consola ?></th>
                                <th><?php echo $juego->anno ?></th>
                                <th><?php echo $juego->precio ?></th>
                                <th> <form action="" method="post"><?php if(($juego->alquilado)=="SI"){ ?> <button class="visibilidad" type="submit" name="alquilar" value="<?php echo $juego->codigo ?>">Alquilar</button> <?php }else{ ?> <button type="submit" name="alquilar" value="<?php echo $juego->codigo ?>">Alquilar</button> <?php } ?></form> </th>
                        <input type="hidden" name="alqui" value="<?php echo $juego->alquilado ?>">
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>



        </body>
    </html>

    <?php
}
?>