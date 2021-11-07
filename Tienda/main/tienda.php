<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../JavaScript/script.js"></script>
    <title>Tienda online</title>
</head>
<body>
    <div id="contenedor">
        <div id="header">
            <h2>TIENDA ONLINE</h2>
        </div>
        <div id="productos">
            <?php
                include ("../clases/BD.php");
                $arr = array();
                BD::llenaLista();
                $aar = BD::obtieneProductos();
                
                for ($i=0; $i < count($aar); $i++) { 
                    
                    $nombreBoton= $aar[$i]->getNombre();
                    printf("<p>%s, Pvp: %d€<button id=%s>Comprar</button><span id=%s></span></p>", $aar[$i]->getNombre(), $aar[$i]->getPvP(),"btn".$nombreBoton, $nombreBoton);
                }
                
                echo "<button id=\"btnCesta\">Añadir a la cesta</button>";
            ?>
        </div>
    </div>
</body>
</html>