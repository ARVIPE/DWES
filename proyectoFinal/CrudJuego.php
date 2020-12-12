<?php

// incluye la clase conexion
require_once('datos/Juego.php');
require_once('conexion/conex.php');

class CrudJuego {

    // constructor de la clase
    public function __construct() {
        
    }

    // método para mostrar todos los juegos
    public function mostrar() {
        $connection = new Conexion();
        $listaJuegos = [];
        $select = $connection->query('SELECT * FROM juegos');


        if ($select->rowCount()) {

            while ($row = $select->fetchObject()) {
                $myJuego = new Juego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen);
                $listaJuegos[] = $myJuego;
            }
            return $listaJuegos;
        }
    }


    public function insertar($juego) {
         try {
        $conex = new Conexion();

        $conex->exec("INSERT INTO juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Precio, Alguilado, Imagen, Descripcion) VALUES ('$juego->codigo','$juego->nombre_juego','$juego->nombre_consola','$juego->anno','$juego->precio', '$juego->alquilado', '$juego->imagen', '$juego->descripcion')");
        
         } catch (PDOException $ex){
             echo "Error";
         }
        
        
    }

    public static function buscarProducto($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE codigo='$codigo'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $myJuego = new Juegos($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen);
                // como es un objeto de la misma clase se puede hacer así
                return $myJuego;
            } else
                return false;
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a1 inicio</a>';
            //header('Location:index.php');
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }

}

?>