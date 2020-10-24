<html>
    <head>
        <title>title</title>
    </head>
    <body>

        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        echo $conex->connect_errno."<br>";
        echo $conex -> connect_error."<br>";
        ?>

    </body>
</html>


