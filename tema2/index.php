<?php

 $conec = new mysqli('localhost','dwes','abc123.','dwes');
 
 if(!$conec->connect_errno){
     $conec->autocommit(false);
     
     $error1= $conec->query('update stock set unidades=1 where tienda=1 and producto="3DSNG"');
     echo "Error 1" . $conec->error;
     
     
     $error2=$conec->query('insert into stock values("3DSNG",3,1)');
     echo "Error 1" . $conec->error; 
     
     if($error1 && $error2){
         $conec->commit();
     }else{
         echo 'No se ha podido actualizar la base de datos';
         $conec->rollback();
     }
     
 }
 