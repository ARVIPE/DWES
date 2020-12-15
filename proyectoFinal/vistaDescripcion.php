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


    $codigo = ($_GET['Codigo']);
    ?>

    <html>
        <head>
            <meta charset="ISO-8859-1">
            <title>Insert title here</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet"
                  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        </head>
        <body>


            <div class="ml-5 mt-4">

                <div class="row">
                    <div class="col-md-4">
                        <?php if ($_SESSION['nombre'] == "Admin") {
                            ?>
                            <a href="loginAdmin.php">Volver</a>

                            <?php
                        } else {
                            ?>
                            <a href="loginNormal.php">Volver</a>
                            <?php
                        }
                        ?>

                        <?php
                        $listaJuegos = $crud->buscarProductoDescripcion($codigo);

                        while ($valor = $listaJuegos->fetchObject()) {
                            ?>
                            <h3><?php echo $valor->Nombre_juego ?></h3>
                            <p><?php echo "<b>Consola:</b> " . $valor->Nombre_consola ?></p>
                            <p><?php echo "<b>Año:</b> " . $valor->Anno ?></p>
                            <p><?php echo "<b>Precio:</b> " . $valor->Precio ?></p>
                            <p><?php echo "<b>Descripción:</b> " . $valor->descripcion ?></p>
                            <form action="" method="post"><button class="visible" type="submit" name="alquilar" value="<?php echo $valor->Codigo ?>" <?php if ($valor->Alguilado == 'SI') echo "style= 'display: none;'"; ?>>Alquilar</button>  </form>
                        </div>
                        <div class="col-md-4">
                                <img width="60%" height="100%"src="<?php echo $valor->Imagen ?>">
                        </div>
                    <?php } ?>
                </div>

            </div>

        </body>
    </html>

<?php } ?>
