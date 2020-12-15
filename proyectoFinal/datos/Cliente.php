<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of juego
 *
 * @author arvip
 */
class Cliente {
    private $nombre;

    public function __construct($nombre = "") {
        $this->nombre = $nombre;

    }
    
    public function nuevoJuego($nombre) {
        $this->nombre = nombre;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name=$value;
    }

    public function __toString() {
        return "Nombre: ".$this->nombre;
    }
}
