<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>

        <?php
        try {



            session_start();


            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=tema4_logueo; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

            $error = $conex->errorInfo();
            echo $error[2];

            if (isset($_POST['enviar'])) {
                try {
                    $registro = $conex->query('INSERT INTO perfil_usuario SET nombre = "' . $_POST[nombre] . '", apellidos = "' . $_POST[apellidos] . '", direccion = "' . $_POST[direccion] . '",  localidad = "' . $_POST[localidad] . '",  user = "' . $_POST[usuario] . '",  pass = "' . md5("$_POST[password]") . '",  color_letra = "' . $_POST[color] . '",  color_fondo = "' . $_POST[fondo] . '",  tipo_letra = "' . $_POST[letra] . '",  tam_letra = "' . $_POST[tamanoLetra] . '" ');

                    
                    
                     while ($fila = $registro->fetch(PDO::FETCH_OBJ)) {
                         $_SESSION['nombre'] = $fila->usuario;
                         $_SESSION['fondo'] = $fila->color_fondo;
                     }
                    
                    
                    header("Location: inicio.php");
                } catch (PDOException $exc) {

                    echo $exc->getTraceAsString(); //error de php
                    echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
                }
            }
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>





        <h1>Formulario de Registro</h1>
        <form action="" method="post">
            Nombre<input type="text" name="nombre" value=""></br>
            Apellido<input type="text" name="apellidos" value=""></br>
            Dirección<input type="text" name="direccion" value=""></br>
            Localidad<input type="text" name="localidad" value=""></br>
            Usuario<input type="text" name="usuario" value=""></br>
            pass<input type="password" name="pass" value=""></br>
            Color letra<select name="color">
                <option  value="red">red</option>
                <option  value="blue">blue</option>
            </select>
            Color fondo<select name="fondo">
                <option  value="green">green</option>
                <option  value="red">red</option>
            </select>
            Tipo letra<select name="letra">
                <option value="Times New Roman">Times New Roman</option>
                <option  value="Verdana">Verdana</option>
            </select>
            Tamaño letra: 
            Color letra<select name="tamanoLetra">
                <option  value="16">16</option>
                <option  value="30">30</option>
                <option  value="44">44</option>
                
            </select>
            </br>
            <input type="submit" name="enviar" value="enviar"/>
        </form>
    </body>
</html>
