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
        if(isset($_POST['send']) && (isset($_POST['origen-calle']) && isset($_POST['origen-numero']) && isset($_POST['tipo']) && isset($_POST["origen-ciudad"]) && isset($_POST['destino-calle']) && isset($_POST['destino-numero']) && isset($_POST['destino-ciudad']))){
            $origen_calle=$_POST['origen-calle'];
            $origen_numero=$_POST['origen-numero'];
            $origen_ciudad=$_POST['origen-ciudad'];

            $destino_calle=$_POST['destino-calle'];
            $destino_numero=$_POST['destino-numero'];
            $destino_ciudad=$_POST['destino-ciudad'];

            $tipo = $_POST['tipo'];
            

            //ORIGEN
            //str_replace(" ","%20",$string)
            $data_origen = str_replace(' ', '%20', sprintf("http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q=%s %d, %s&type=portal&portal=%d",$origen_calle,$origen_numero,$origen_ciudad,$origen_numero));
    
            $origen_callback = file_get_contents("$data_origen");
            $origen_callback = substr($origen_callback,9,-1);
            $origen_datos=json_decode($origen_callback);
            
            $origen_latitud=$origen_datos->lat;
            $origen_longitud=$origen_datos->lng;

            //DESTINO

            $data_destino = str_replace(' ', '%20', sprintf("http://www.cartociudad.es/geocoder/api/geocoder/findJsonp?q=%s %d, %s&type=portal&portal=%d",$destino_calle,$destino_numero,$destino_ciudad,$destino_numero));
            
            $destino_callback = file_get_contents("$data_destino");
            $destino_callback = substr($destino_callback,9,-1);
            $destino_datos=json_decode($destino_callback);
            
            $destino_latitud=$destino_datos->lat;
            $destino_longitud=$destino_datos->lng;

            //CALCULO DE DE TIEMPO

            $data_time = str_replace(' ', '%20', sprintf("http://www.cartociudad.es/services/api/route?orig=%f,%f&dest=%f,%f&locale=es&vehicle=%s",$origen_latitud,$origen_longitud,$destino_latitud,$destino_longitud,$tipo));
            $callback_time = file_get_contents("$data_time");
            $datos_time=json_decode($callback_time);

            //MUESTREO DE DATOS

            echo "<p>El tiempo estimado es :$datos_time->time</p>";
            echo sprintf("<p>La distancia estimada es de %d metros</p>",$datos_time->distance);
            
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
