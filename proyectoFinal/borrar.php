<?php

//incluye la clase Juego y CrudJuego
require_once('CrudJuego.php');
require_once('datos/Juego.php');

$crud = new CrudJuego();
$juego = new Juego();

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;


$crud->borrar($codigo);

header('Location: index.php');



?>

