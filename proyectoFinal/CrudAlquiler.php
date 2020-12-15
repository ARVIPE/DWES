<?php

// incluye la clase conexion
require_once('datos/Juego.php');
require_once('conexion/conex.php');

class CrudAlquiler {

    // constructor de la clase
    public function __construct() {
        
    }

    public static function insertar($id, $codigo, $dni, $fechaA, $fechaD) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO alquiler VALUES('$id','$codigo','$dni','$fechaA','$fechaD')");
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            //header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }

    public function cambiarAlquiler($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");

            $alquiler = "SI";
            $result->bindParam(1, $alquiler);



            $result->execute();
            $result = null;
        } catch (PDOException $ex) {
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public function cambiarAlquilerNO($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");

            $alquiler = "NO";
            $result->bindParam(1, $alquiler);

            $result->execute();
            $result = null;
        } catch (PDOException $ex) {
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public function eliminarAlquiler($cod) {
        try {
            $conex = new Conexion();
            $fechaD = date("Y-n-d");
            $result = $conex->exec("UPDATE alquiler SET Fecha_devol='$fechaD' WHERE Cod_juego ='$cod'");
            
   
             
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    // método para mostrar todos los juegos
    public function mostrar() {
        $connection = new Conexion();
        $listaJuegos = [];
        
        $select = $connection->query("SELECT * FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND Fecha_devol='null'");


        if ($select->rowCount()) {

            while ($row = $select->fetchObject()) {
                $myJuego = new Juego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen);
                $listaJuegos[] = $myJuego;
            }
            return $listaJuegos;
        }
    }
    
     // método para mostrar juegos del cliente
    public function mostrarCliente($dni) {
        $connection = new Conexion();
        $listaJuegos = [];
        
        $select = $connection->query("SELECT * FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente='$dni' AND alquiler.DNI_cliente=cliente.DNI AND Fecha_devol='null'");
        
        return $select;
        

        
    }
    
       public function mostrarAlquilados() {
        $connection = new Conexion();
        $listaJuegos = [];
        
        $select = $connection->query("SELECT * FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND Fecha_devol='null'");
        
        return $select;
    }
    
        public function  calculoFechas($id,$cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from alquiler WHERE id='$id' AND Cod_juego='$cod'");
           
           
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
       public function pagoCliente($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT Precio from alquiler, juegos WHERE id='$id' AND Codigo=Cod_juego");
           
           
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
}
