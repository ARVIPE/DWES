<?php

//incluye la clase Libro y CrudLibro
require_once('CrudJuego.php');
require_once('datos/Juego.php');

$crud = new CrudJuego();
$juego = new Juego();

// si el elemento insertar no viene nulo llama al crud e inserta un libro
if (isset($_POST['insertar'])) {

    $string = "$_POST[nombre]";

    $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $string, $matches);
    $result = implode('', $matches[0]);
    $result = strtoupper($result);


    $juego->nuevoJuego($result . "-" . $_POST['consola'], $_POST['nombre'], $_POST['consola'], $_POST['anno'], $_POST['precio'], "No", "imagenes/" . $_POST['foto'], $_POST['descripcion']);


    //llama a la función insertar definida en el crud
    $crud->insertar($juego);
    header('Location: index.php');
} elseif (isset($_POST['actualizar'])) {
    $libro->setId($_POST['id']);
    $libro->setNombre($_POST['nombre']);
    $libro->setAutor($_POST['autor']);
    $libro->setAnio_edicion($_POST['edicion']);
    $crud->actualizar($libro);
    header('Location: index.php');
}
?>
