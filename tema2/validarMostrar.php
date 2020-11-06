<html>
    <head>
        <title>resultados</title>
    </head>
    <body>
         <?php
        echo ($_POST['nombre']."<br/>");
        echo ($_POST['dni']."<br/>");
        echo ($_POST['fechaNac']."<br/>");
        echo ($_POST['edad']);
        ?>
        <form name="input" action="validarCampos.php" method="post">
        <br/>
        <input type="submit" value="Cancelar" name="cancelar"/>
        <input type="hidden" value="<?php echo $_POST['nombre']?>" name="nombre"/>
        <input type="hidden" value="<?php echo $_POST['dni']?>" name="dni"/>
        <input type="hidden" value="<?php echo $_POST['fechaNac']?>" name="fechaNac"/>
        <input type="hidden" value="<?php echo $_POST['edad']?>" name="edad"/>
        <br/>
        <input type="submit" value="Confirmar" name="confirmar"/>

    </body>
</html>
