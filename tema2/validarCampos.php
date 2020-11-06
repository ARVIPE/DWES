<html>
    <head>
        <title>validación</title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviar'])) {
            ?>
            <?php
            if (preg_match('/^[a-z]{1,30}$/i', $_POST['nombre'])) {
                echo ($_POST['nombre'] . "<br/>");
            } else {    
                echo ("<span style='color:red'>  Nombre no valido</span>" . "<br/>");
            }
            if (preg_match('/^[0-9]{8}[A-Z]$/', $_POST['dni'])) {
                echo ($_POST['dni'] . "<br/>");
            } else {
                echo ("<span style='color:red'>  DNI no valido</span>" . "<br/>");
            }
            if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fechaNac'])) {
                echo ($_POST['fechaNac'] . "<br/>");
            } else {
                echo ("<span style='color:red'>  FechaNac no valido</span>" . "<br/>");
            }
            if (preg_match('/^\d{1,2}$/', $_POST['edad'])) {
                echo ($_POST['edad'] . "<br/>");
            } else {
                echo ("<span style='color:red'>  Edad no valida</span>" . "<br/>");
            }
            ?>

            <?php
        } else {
            ?>
         FORMULARIO:
            
                <form name="input"  action="" method="post">

                    Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['cancelar'])) {
                        echo $_POST['nombre'];
                    }
                    ?>" />
                    
                    <br/>
                    Dni: <input type="text" name="dni" value="<?php if(isset($_POST['cancelar'])){
                        echo $_POST['dni'];
                    }?>" />
                    
                    <br/>
                    FechaNac: <input type="text" name="fechaNac" value="<?php if (isset($_POST['cancelar'])) {
                        echo $_POST['fechaNac'];
                    }
                    ?>" />
                    
                    <br/>
                    Edad: <input type="text" name="edad" value="<?php if(isset($_POST['cancelar'])){
                        echo $_POST['edad'];
                    }?>" />

                    <br/>
                    <input type="submit" value="Enviar" name="enviar"/>
                </form>
         <?php
            }
            ?>
    </body>
</html>
