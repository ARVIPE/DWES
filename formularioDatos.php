<html>
    <head>
        <title>formulario</title>
    </head>
    <body>
        <?php
        
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $sexo = $_POST['sexo'];
          $estadoCivil = $_POST['estado'];
          $aficiones = $_POST['aficiones'];
          $estudios = $_POST['estudios'];
          $edad = $_POST['edad'];
          print "Nombre: ".$nombre."<br />";
          print "Apellido: ".$apellido."<br />";
          print "Sexo: ".$sexo."<br />";
          print "EstadoCivil: ".$estadoCivil."<br />";
          print "Aficiones: ".$aficiones."<br />";
          print "Estudios: ".$estudio."<br />";
          print "Edad: ".$edad."<br />";
        ?>
        
             <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Dia: <input type="number" name="nombre" value="<?php
          
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
        
    </body>
</html>