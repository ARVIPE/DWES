<html>
    <head>
        <title>conjunto</title>
    </head>
    <body>

        <div id="encabezado">
            <h1>Conjunto de resultados en Mysqli</h1>
            <form action="" method="post">
                Producto: <select name="producto">

                    <?php
                    $conexion = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');


                    if (!$conexion->connect_errno) {

                        $result = $conexion->query('SELECT cod, nombre_corto from producto');

                        if (!$conexion->erno) {
                            if ($result->num_rows) {
                                while ($fila = $result->fetch_array()) {

                                    echo '<option value"' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                                }
                            }
                        } else {
                            echo'No se ha podido hacer la conexion';
                        }
                    }
                    ?>
                </select>

                <div id="contenido">
                    <h1>Stock del producto en tiendas</h1>
                    <form action=" " method="post">
                        <?php
                        if (isset($_POST["mostrar"]) && !empty($_POST['producto'])) {
                            $result = $conex->query('select ti.nombre, st.unidades from stock st join tienda ti where ti.cod=st.tienda and st.producto="' . $producto . '"');

                            $producto = $_POST['producto'];

                            if ($result) {

                                while ($fila = $result->fetch_array()) {
                                    echo "Tienda: " . $fila['nombre'] . " : <input type='text' name'uni[]' value='$fila[unidades]'>";

                                    echo "<input type='hidden' name='codigoTienda[]' value='$fila[cod]'>";

                                    echo "<input type='hidden' name='codigoTienda[]' value='$fila[cod]'>";
                                }
                                ?>

                                <input type="submit" name="actualizar" value="Actualizar">
                            </form>


                            <?php
                        }
                    }
                    if (isset($_POST["actualizar"])) {
                            $consult = $conex->smt_init();
                            $consult->prepare('update stock set unidades=? where tienda=? producto=?');
                            $consult->bind_param('sss', $unidades, $tienda, $producto);

                        for ($i = 0; $i < count($_POST['unidades']); $i++) {
                            $unidades = $_POST['unidades'][$i];
                            $tienda = $_POST['cod'][$i];
                            $producto = $_POST['producto'];
                            $consult->execute();
                        }
                        $result2->close();
                        $consult->close();
                    }
                    ?>





                    </div>



                    </body>
                    </html>
