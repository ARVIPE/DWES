<html>
    <head>
        <title>Ejercicio1</title>
    </head>
    <body>
        <?php
        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);


            $error = $conex->errorInfo();
            echo $error[2];
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        $ok = true;
        $conex->beginTransaction();
        if ($conex->exec("UPDATE stock SET unidades=1 WHERE tienda=1 and producto='PAPYRE62GB'") === 0) {
            $ok = false;
            echo ' update 1';
        } else {
            echo 'update 2';
        }
        
         if ($conex->exec("INSERT INTO stock VALUES('PAPYRE62GB', 2, 1)") === 0) {
            $ok = false;
            echo 'insert 1';
        } else {
            echo 'insert 2';
        }

        if ($ok) {
            $conex->commit(); 
            echo 'Operación realizada';
        } else {
            $conex->rollBack(); 
        }
       
        ?>

    </body>
</html>
