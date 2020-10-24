<html lang="es" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Agenda</title>
        <style>
            .bajoDch{float:right;position:absolute;margin-bottom:15px;margin-right:10px;bottom:0px; right:0px;}
            .bajoDch1{float:right;position:absolute;margin-bottom:40px;margin-right:10px;bottom:0px; right:0px;}
            .bajoDch2{float:right;position:absolute;margin-bottom:65px;margin-right:10px;bottom:0px; right:0px;}
            .altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
            .altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
        </style>
    </head>
    <body>



        <?php
        if (isset($_POST['enviar'])) {
            $arrayPersonas = array();
            if (!empty($_POST['cadena'])) {
                $arrayPersonas = json_decode(($_POST['cadena']), true);
            }
            if (!empty($_POST['nombre']) && !empty($_POST['telefono'])) {
                if (array_key_exists($_POST['nombre'], $arrayPersonas)) {
                    ?><p class="altoDch1">Registro modificado</p><?php
                } else {
                    ?><p class="altoDch2">Registro añadido</p><?php
                }

                $arrayPersonas[$_POST['nombre']] = $_POST['telefono'];
            }
            
                if (!empty($_POST['nombre']) && empty($_POST['telefono'])) {
                    if (array_key_exists($_POST['nombre'], $arrayPersonas)) {
                        unset($arrayPersonas[$_POST['nombre']]);
                        ?><p class="altoDch1">Registro eliminado</p><?php
                        

                    }else{
                        ?><p class="altoDch1">No existe ese registro</p><?php
                    }
                  
                }
                echo "<table border=1>";
            foreach ($arrayPersonas as $clave => $valor) {
                echo "<tr>";
                echo "<td>", $clave, "</td>";
                echo "<td>", $valor, "</td>";
                echo "</tr>";
                
            }
            echo "</table>";
        }
        ?>
        <form action="" method="POST">
            <p class="bajoDch2">Nombre: <input type="text" name="nombre"></p>
            <p class="bajoDch1">Número: <input type="number" name="telefono"></p>
            <p>
                <input class="bajoDch" type="submit" name="enviar" value="enviar">
            </p>
            <input type="hidden" name="cadena" value=<?php if (isset($arrayPersonas)) echo json_encode($arrayPersonas); ?>>
        </form>


    </body>
</html>