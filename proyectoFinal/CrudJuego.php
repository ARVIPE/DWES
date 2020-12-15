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
        } catch (PDOException $ex) {
            echo "Error";
        }
    }

    public function modificar($juego) {
        try {
            $conex = new Conexion();
            
            if($_POST['foto']){
                $conex->exec("update juegos set Nombre_juego='$juego->nombre_juego',Nombre_consola='$juego->nombre_consola',Anno='$juego->anno',Precio='$juego->precio', Imagen='$juego->imagen', descripcion='$juego->descripcion' where codigo='$juego->codigo'");
            }else{
                $conex->exec("update juegos set Nombre_juego='$juego->nombre_juego',Nombre_consola='$juego->nombre_consola',Anno='$juego->anno',Precio='$juego->precio', descripcion='$juego->descripcion' where codigo='$juego->codigo'");
            }
            
            
        } catch (PDOException $ex) {
            echo "Error";
        }
    }

    public function borrar($codigo) {
        try {
            $conex = new Conexion();

            $conex->exec("delete from juegos where codigo='$codigo'");
        } catch (Exception $ex) {
            
        }
    }

    public static function buscarProducto($codigo) {
        $connection = new Conexion();
        $listaJuegos = [];
        $select = $connection->query("SELECT * FROM juegos WHERE codigo='$codigo'");

         if ($select->rowCount()) {

            while ($row = $select->fetchObject()) {
                $myJuego = new Juego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);
                $listaJuegos[] = $myJuego;
            }
            return $listaJuegos;
        }
    
    }
    
     public static function buscarProductoDescripcion($codigo) {
        $connection = new Conexion();
        $listaJuegos = [];
        $select = $connection->query("SELECT * FROM juegos WHERE codigo='$codigo'");

        return $select;
    
    }

}

?>