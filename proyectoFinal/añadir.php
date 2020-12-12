<html>
    <head>
        <title>añadirJuego</title>
    </head>
    <body>

        <a href="loginAdmin.php">Volver</a>
        <h1>Añadir juego</h1>

        <form action="administrarJuego.php" method="post">
            Nombre:<input type="text" name= "nombre" value=""></br>
            Consola:<input type="text" name="consola" value=""></br>
            Año:<input type="number" name="anno" value=""></br>
            Precio:<input type="number" name="precio" value=""></br>
            Descripción:<textarea name="descripcion"></textarea></br>
            Imagen: <input type="file" name="foto">
            <input type="submit" name="insertar" value="Insertar">
        </form>



    </body>
</html>
