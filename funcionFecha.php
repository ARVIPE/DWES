<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>Desarrollo Web</title>
     </head>
     <body>
<?php
    require_once 'functfecha.php';
     if (!empty($_POST['mes']) && !empty($_POST['dia'] && !empty($_POST['año']))) {
          $dia = $_POST['dia'];
          $mes = $_POST['mes'];
          $año = $_POST['año'];
           if(checkdate($_POST['mes'], $_POST['dia'], $_POST['año'])){  
               echo "La fecha es correcta";
               echo fechaesp(mktime(0,0,0,$_POST['mes'],$_POST['dia'],$_POST['año']));
              }else{
                  echo "La fecha es incorrecta";
              }
     }
     else {
?>
     <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Dia: <input type="number" name="dia" value="<?php
          
               if(!empty($_POST['dia'])){
                  echo $_POST['dia'];
  
               }
               ?>"/>
            Mes: <input type="number" name="mes" value="<?php
          
               if(!empty($_POST['mes'])){
                  echo $_POST['mes'];
               }
               ?>"/>
            Año: <input type="number" name="año" value="<?php
          
               if(!empty($_POST['año'])){
                  echo $_POST['año'];
               }
               ?>"/>
          <?php
               if (isset($_POST['enviar']) && empty($_POST['dia']))
                    echo "<span style='color:red'> &lt;-- Debe introducir un dia!!</span>"
          ?>
            <?php
               if (isset($_POST['enviar']) && empty($_POST['mes']))
                    echo "<span style='color:red'> &lt;-- Debe introducir un mes!!</span>"
          ?>
            <?php
               if (isset($_POST['enviar']) && empty($_POST['año']))
                    echo "<span style='color:red'> &lt;-- Debe introducir un año!!</span>"
          ?>
            
          <input type="submit" value="Enviar" name="enviar"/>
     </form>
<?php
     }
?>
     </body>
</html>

