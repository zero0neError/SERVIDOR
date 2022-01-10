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
        if(isset($_FILES['fichero'])){
            BD::Conectar();
            $codigo = BD::getCodeUser();
            move_uploaded_file($_FILES['fichero'],"./imagenes/imagen1.jpg");
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <p>Envia fichero:</p>
    Fichero1:
    <input type="file" name="fichero" id="fichero1">
    <p><input type="submit" value="Enviar"></p>
    </form>
</body>
</html>