<html>
    <head>
        <title>login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
         <div id='login'>
            <form action='' method='post'>
                <fieldset >
                    <legend>Login</legend>
                    <div><span class='error'>	</span></div>
                    <div class='campo'>
                        <label for='usuario' >Usuario:</label><br/>
                        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <label for='contraseña' >Contraseña:</label><br/>
                        <input type='password' name='contraseña' id='contraseña' maxlength="50" /><br/>
                    </div>
                    <div class='campo'>
                        <input type='submit' name='enviar' value='Enviar' />
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>
