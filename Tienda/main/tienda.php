<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tienda online</title>
</head>
<body>
    <div id="contenedor">
        <div id="header">
            <p>TIENDA ONLINE</p>
        </div>
        <div id="productos">
            <?php
                include ("../clases/BD.php");
                BD::llenaLista();
                
                
            ?>
        </div>
    </div>
</body>
</html>