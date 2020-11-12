<html>
    <head>
        <title>Reserva</title>
    </head>
    <body>

        <h1>AUTOBUSES XXX</h1>



        <form action=" " method="post">

            Fecha: <input type="date" name="fecha" value="">
            </br>
            </br>
            Origen : 
            <select name="origen">

                <option>Madrid</option>

                <option>Malaga</option>

                <option>Cordoba</option>

            </select>
            </br>
            </br>
            Destino: 
            <select name="destino">

                <option>Malaga</option>

                <option>Sevilla</option>

                <option>Barcelona</option>

                <option>Huelva</option>

            </select>
            </br>
            </br>
            <input type="submit" name="enviar" value="enviar">   
            <?php
            if (isset($_POST['enviar'])) {
                ?>

                <input type='hidden' name='fechaguardada' value="<?php echo $_POST['fecha']; ?>">

                <?php
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
                $result = $conex->query("select * from viajes where Fecha = '$_POST[fecha]' and Origen= '$_POST[origen]' and Destino = '$_POST[destino]'");

                if (!$conex->errno) {
                    $fila = $result->fetch_array()
                    ?> 
                    </br>
                    Plazas Disponibles: <input type="text" name="plazas" value="<?php echo $fila['Plazas_libres'] ?>">
                    </br>
                    NumReservar:  <input type="number" name="num" value="">
                    </br>
                    <input type="submit" name="reservar" value="reservar">




                    <?php
                } else {
                    echo 'No se ha podido acceder';
                }
            }
            ?>


            <?php
            if (isset($_POST['reservar'])) {


                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
                $plazasLibres = $_POST['plazas'] - $_POST['num'];

               
                
                if($plazasLibres >= 0 && $_POST['num'] >= $plazasLibres){
                       $result = $conex->query("UPDATE viajes SET Plazas_libres = $plazasLibres where Fecha= '$_POST[fechaguardada]' and Origen = '$_POST[origen]' and Destino= '$_POST[destino]'");
                }else{
                    echo "No quedan plazas :/";
                   
                }

              
            }
            ?>





        </form>
    </body>
</html>
