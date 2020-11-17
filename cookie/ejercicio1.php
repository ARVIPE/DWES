<?php

setcookie('ultimoAcceso', date('d-m-y h:i:s'), time()+3600);

if(isset($_COOKIE['ultimoAcceso'])){
    echo "Su último acceso fue:";
    echo $_COOKIE['ultimoAcceso'];
}else{
    echo 'Primer acceso a la página';
}



?>