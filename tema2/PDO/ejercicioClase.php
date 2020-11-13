<html>
    <head>
        <title>Ejercicio Clase</title>
    </head>
    <body>
        
        
        <?php
        

        try {

            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $dwes = new PDO('mysql:host=localhost; dbname=jugadores; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
  
            
            $result= $dwes->prepare("select * from jugadores where dorsal=?");
            $dorsal=3;
            $result->bindParam(1,$dorsal);
            $result->execute();
            print_r ($result->errorInfo());
            while($obj=$result->fetchObject()){
                echo "Nombre: ".$obj->nombre."<br>";
            }
            
            

            $error = $dwes->errorInfo();
            echo $error[2];
            
        } catch (PDOException $exc) {

            echo $exc->getTraceAsString(); //error de php
            echo "Error: " . $exc->getMessage(); //error del servidor de la bbdd
        }
        ?>
        
        
        
        
        
        
        
        
       

    </body>
</html>
