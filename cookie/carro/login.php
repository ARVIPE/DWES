<?php



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Ejemplo: Tienda web. login.php -->
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div id='login'>
    <form action='login.php' method='post'>
     <fieldset >
        <legend>Login</legend>
        <div><span class='error'>	</span></div>
    <div class='campo'>
        <label for='usuario' >Usuario:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <label for='password' >Contraseña:</label><br/>
        <input type='password' name='contra' id='password' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <input type='submit' name='enviar' value='Enviar' />
    </div>
      </fieldset>
    </form>
</div>

<?php




?>
</body>
</html>



