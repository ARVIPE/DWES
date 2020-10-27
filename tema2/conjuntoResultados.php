<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <h1>Ejercicio Conjunto de Resultados Mysqli</h1>

        <form action=" " target="_blank">

            <p>

                Producto:

               

                   <?php
                   
                   echo "<select>";
                        $conec = new mysqli('localhost','dwes','abc123.','dwes');
                        $result = $conec->query("SELECT * FROM producto");
                        
                        if (!$conec->errno) {
                            if ($result->num_rows) {
                                while ($fila = $result->fetch_object()) {
                                    echo "<option>". $fila->nombre_corto. "</option>";
                                }
                            }
                        }
                    echo "</select>"; 
                    
                        ?>



            </p>
            <input type="submit" value="Mostrar Stock">


            <h1>Stock del producto en las tiendas</h1>

            <?php
            if (!empty($_POST['nombre_corto'])) {
                $producto = $_POST['nombre_corto'];
                $result = $conex->query('select ti.nombre, st.unidades from stock st join tienda ti where ti.cod=st.tienda and st.producto="' . $producto . '"');

                if (!$conex->errno) {
                    if ($result->num_rows) {
                        while ($fila = $result->fetch_array()) {
                            echo 'Tienda: ' . $fila['nombre'] . ': ' . $fila['unidades'] . ' unidades.<br>';
                        }
                    }
                } else {
                    echo 'No se ha podido acceder';
                }
            }
            ?>

        </form>
    </body>
</html>

