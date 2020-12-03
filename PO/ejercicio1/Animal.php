<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author arvip
 */
class Animal {

    function funcionA() {
        if (isset($this)) {
            echo '$this está definido, su clase es: ';
            // La función get_class devuelve el nombre de la clase de un objeto:
            echo get_class($this) . "<br>";
        } else {
            echo '$this no está definido <br>';
        }
    }

}
