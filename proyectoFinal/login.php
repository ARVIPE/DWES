<?php

include('conexion/conex.php');
session_start();
 
if (isset($_POST['login'])) {
    $connection = new Conexion();
    
    
    $dni = $_POST['dni'];
    $clave = $_POST['clave'];                                                                                              
                                     

    $query = $connection->prepare("SELECT * FROM cliente WHERE DNI=:dni and Clave=md5(:clave)");
    
    $query->bindParam(':dni', $dni, PDO::PARAM_STR);
    $query->bindParam(':clave', $clave, PDO::PARAM_STR);

    $query->execute();
    
    
  
    $result = $query->fetch(PDO::FETCH_ASSOC);

    
    
    if (!$result) {
        echo '<p>Su nombre de usuario o de contraseña es incorrecto</p>';
    } else {
            echo '<p>Es correcto</p>';
                
                
                $_SESSION['nombre'] =  $result["Nombre"];
                $_SESSION['dni'] = $result["DNI"];
              
               
                
                // Si encuentra en el array algun elemento que contenga la palabra admin entonces vamos al admin
                if(array_search('admin', $result)){ 
                    header("Location: loginAdmin.php");
                }else{
                 header("Location: loginNormal.php");
                }
           
           }
        }
    

 
?>