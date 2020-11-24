<html>
    <head>
        <title>mostrar</title>
        <style>
            fieldset {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 230px;
                margin-left: -115px;
                height: 300px;
                margin-top: -150px;
                padding:10px;
                border:1px solid #ccc;
                background-color: #eee;
            }

            legend {
                font-family : Arial, sans-serif;
                font-size: 1.3em;
                font-weight:bold;
                color:#333;
            }

            input[type="text"], input[type="password"] {
                font-family : Arial, Verdana, sans-serif;
                font-size: 0.8em;
                line-height:140%;
                color : #000; 
                padding : 3px; 
                border : 1px solid #999;
                height:18px;
                width:220px;
            }

            input[type="submit"] {
                width:160px;
                height:30px;
                padding-left:0px;
            }

            select {
                font-family : Arial, Verdana, sans-serif;
                font-size: 0.8em;
                line-height:140%;
                color : #000; 
                padding : 3px; 
                border : 1px solid #999;
                height:30px;
                width:220px;
            }

            a {
                font-family: Verdana, Arial, sans-serif; 
                font-size: 0.7em;
            }

            div.campo {
                margin-top:8px;
                margin-bottom: 10px;
            }

            span.mensaje {
                font-family: Verdana, Arial, sans-serif; 
                font-size: 0.7em;
                color: #009;
                background-color : #ffff00;
            }

            label.etiqueta {
                font-family : Arial, sans-serif;
                font-size:0.8em;
                font-weight: bold;
            }

            label.texto {
                font-family : Arial, Verdana, sans-serif;
                font-size: 1em;
                line-height:140%;
                color : #000; 
            }



        </style>
    </head>
    <body>

        <fieldset>
            <h2>Preferencias</h2>
            <?php
            session_start();
            
            if(isset($_POST['borrar'])){
               
               
              session_destroy();
              
          
               
              header("Location: mostrar.php");
              
            
              
               
            }
            ?>
            <form action="" method="post">
                <legend>Idioma:</br>

                <?php if (isset($_SESSION['idioma'])) echo $_SESSION['idioma'] ?>

                </br>
                Perfil público:</br>

                <?php if (isset($_SESSION['perfil'])) echo $_SESSION['perfil'] ?>
                </br>
                Zona horaria:</br>

                <?php if (isset($_SESSION['zona'])) echo $_SESSION['zona'] ?>

                </br>

                <input type="submit" name="borrar" value="Borrar preferencias">
                </br>

                <a href="preferencias.php">Establecer preferencias</a>



            </form>
           
        </fieldset>
    </body>
</html>
