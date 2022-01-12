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
        if(isset($_POST['send']) && (isset($_POST['origen-calle']) && isset($_POST['origen-numero']) && isset($_POST['tipo']) && isset($_POST["origen-ciudad"]))){
            $origen_calle=$_POST['origen-calle'];
            $origen_numero=$_POST['origen-numero'];
            $origen_ciudad=$_POST['origen-ciudad'];
            echo "http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q={$_POST["origen-calle"]}%20{$_POST["origen-numero"]},%20{$_POST["origen-ciudad"]}&type=portal&portal={$_POST["origen-numero"]}&outputformat=geojson";
            $data = sprintf("http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q=%s %d, %s&type=portal&portal=%d");
            $fichero = file_get_contents("http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q={$_POST["origen-calle"]}%20{$_POST["origen-numero"]},%20{$_POST["origen-ciudad"]}&type=portal&portal={$_POST["origen-numero"]}&outputformat=geojson");
            $fichero = substr($fichero,9,-1);
            $datos=json_decode($fichero);
            var_dump($datos);
            $latitud=$datos->lat;
            $longitud=$datos->lng;
            
            //$distance = file_get_contents("http://www.cartociudad.es/services/api/route?orig={$_POST['orig-lng']},{$_POST['orig-lat']}&dest={$_POST['dest-long']},{$_POST['dest-lat']}&locale=es&vehicle={$_POST['tipo']}");
        }
        
    ?>
    
    <form action="" method="post">
        <p>________________Origen________________</p>
        Calle: <input type="text" name="origen-calle"><br><br>
        Numero: <input type="text" name="origen-numero"><br><br>
        Ciudad: <input type="text" name="origen-ciudad"><br><br>
        <p>________________Destino_______________<p>
        Calle: <input type="text" name="destino-calle"><br><br>
        Numero: <input type="text" name="destino-numero"><br><br>
        Ciudad: <input type="text" name="destino-ciudad"><br><br>
        <p>Modo de transporte (CAR/WALK)</p>
        Modo: <input type="text" name="tipo"><br><br>
        <input type="submit" value="Enviar" name="send">   
    </form>
</body>
</html>
