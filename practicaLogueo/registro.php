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

                    
                    
                    $_SESSION['nombre'] = $_POST['usuario'];
                    $_SESSION["color"] = $_POST['color'];
                    
                    
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
                <option  value="rojo">rojo</option>
                <option  value="azul">azul</option>
            </select>
            Color fondo<select name="fondo">
                <option  value="rojo">rojo</option>
                <option  value="azul">azul</option>
            </select>
            Tipo letra<select name="letra">
                <option value="times">Times New Roman</option>
                <option  value="calibri">Calibri</option>
            </select>
            Tamaño letra: 
            <select name="tamanoLetra">
                <?php foreach (range(1, 12) as $num): ?>
                    <option value="<?php echo $num; ?>"><?php echo $num; ?></option>
                <?php endforeach; ?>
            </select>
            </br>
            <input type="submit" name="enviar" value="enviar"/>
        </form>
    </body>
</html>
