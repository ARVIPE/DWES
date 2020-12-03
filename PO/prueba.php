<?php

class Persona{

    private $nombre;
    private $apellido;
    private $edad;
    
 
    function __construct($nombre="", $apellido="", $edad=20) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }
    
    function _get($name){
        return $this->$name;
    }
    
}
    
    
    
    









?>