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
            <form action="login.php" method="post">
                Dni:<input type="text" name="dni">
                Contraseña:<input type="text" name="clave">
                <input type="submit" name="login" value="login">
            </form>
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
