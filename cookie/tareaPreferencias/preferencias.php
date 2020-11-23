<html>
    <head>
        <title>preferencias</title>
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
            if (isset($_POST['establecer'])) {
                ?>
                <span class="mensaje">Información guardada en la sesión</span>
                
                <?php
                $_SESSION['idioma'] = $_POST['idioma'];
                $_SESSION['perfil'] = $_POST['perfil'];
                $_SESSION['zona'] = $_POST['zona'];
                
            
            }
            ?>
            <form action="" method="post">
                <legend>Idioma:</br><select name="idioma">
                            <?php
                            $idiomas = ["Español", "Inglés"];
                            foreach ($idiomas as $idioma){
                               ?> <option value="<?php echo $idioma?>" <?php if(isset($_SESSION['idioma'])) if($_SESSION['idioma'] == $idioma) echo "selected"?>><?php echo $idioma;?></option>
                            
                               <?php
                            }

                            ?>
                    </select>
                    </br>
                    Perfil público:</br><select name="perfil">
                        
                        <?php
                        $perfiles = ["si", "no"];
                        foreach ($perfiles as $perfil){
                            ?> <option value="<?php echo $perfil?>" <?php if(isset($_SESSION['perfil'])) if($_SESSION['perfil'] == $perfil) echo "selected"?>><?php echo $perfil;?></option>
                        
                            <?php
                        }
                        
                        
                        ?>


                    </select>
                    </br>
                    Zona horaria:</br><select name="zona">
                        
                        
                        <?php
                        
                        $zonas = ["GMT-2", "GMT-1", "GMT", "GMT+1", "GMT+2"];
                        
                        foreach($zonas as $zona){
                            ?><option value="<?php echo $zona?>" <?php if(isset($_SESSION['zona'])) if($_SESSION['zona'] == $idioma) echo "selected"?>><?php echo $zona;?></option>
                            
                            <?php
                        }
                        ?>


                    </select>
                    </br>

                    <input type="submit" name="establecer" value="Establecer preferencia">
                    </br>

                    <a href="mostrar.php">Mostrar preferencias</a>



            </form>

            
        </fieldset>


    </body>
</html>
