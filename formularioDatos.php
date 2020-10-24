<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>
        <?php
     if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $sexos = $_POST['sexos'];
      /**    $estadoCivil = $_POST['estado'];
          $aficiones = $_POST['aficiones'];
          $estudios = $_POST['estudios'];**/
          $edad = $_POST['edad'];
          print "Nombre: ".$nombre."<br />";
          print "Apellido: ".$apellido."<br />";
          foreach ($sexos as $sexo) {   
               print "Sexo: ".$sexo."<br />";
          }
         /** print "EstadoCivil: ".$estadoCivil."<br />";
          print "Aficiones: ".$aficiones."<br />";
          print "Estudios: ".$estudio."<br />";**/
          print "Edad: ".$edad."<br />";
     }
     else {
?>
     <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          Nombre: <input type="text" name="nombre" value="<?php 
          
               if(!empty($_POST['nombre'])){
                  echo $_POST['nombre'];
               }
               ?>"/>
          <?php
               if (isset($_POST['enviar']) && empty($_POST['nombre']))
                    echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"
          ?>
          <br />
          Apellido: <input type="text" name="apellido" value="<?php
          
               if(!empty($_POST['apellido'])){
                  echo $_POST['apellido'];
               }
               ?>"/>
          <?php
               if (isset($_POST['enviar']) && empty($_POST['apellido']))
                    echo "<span style='color:red'> &lt;-- Debe introducir un apellido!!</span>"
          ?>
          <br />
          <p>Sexo:
          <?php
               if (isset($_POST['enviar']) && empty($_POST['sexos']))
                    echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"
          ?>
          </p>
          <input type="checkbox" name="sexos[]" value="H"
               <?php
                    if(isset($_POST['sexos']) && in_array("sexo",$_POST['sexos']))
                         echo 'checked="checked"';
               ?>
          />
               Hombre
               <br />
          <input type="checkbox" name="sexos[]" value="M"
               <?php
                    if(isset($_POST['sexos']) && in_array("M",$_POST['sexos']))
                         echo 'checked="checked"';
               ?>
          />
               Mujer<br />
          <br />
          <input type="submit" value="Enviar" name="enviar"/>
     </form>
<?php
     }
?>
    </body>
</html>