<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['send']) && (isset($_POST['calle']) && isset($_POST['numero']) && isset($_POST['tipo']) && isset($_POST["ciudad"]))){

            echo "http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q={$_POST["calle"]}{$_POST["numero"]}, {$_POST["ciudad"]}&type=portal&portal={$_POST["numero"]}";
            $fichero = file_get_contents("http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q={$_POST["calle"]}{$_POST["numero"]}, {$_POST["ciudad"]}&type=portal&portal={$_POST["numero"]}");
            $fichero = substr($fichero,9,-1);
            $datos=json_decode($fichero);
            $latitud=$datos->lat;
            $longitud=$datos->lng;
        }
        
    ?>
    
    <form action="" method="post">
        Calle: <input type="text" name="calle"><br><br>
        Numero: <input type="text" name="numero"><br><br>
        Ciudad: <input type="text" name="ciudad"><br><br>
        Modo de transporte (CAR/WALK): <input type="text" name="tipo"><br><br>
        <input type="submit" value="Enviar" name="send">   
    </form>
</body>
</html>
