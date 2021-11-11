<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="text"],input[type="password"]{
            outline:0;
            border-width: 0 0 2px;
            border-color: blue;
            font-size:20px;
            width:120px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['Enviar'])){
            
            include_once "/libs/BD.php";
            if(BD:Conectar()){

                
            }
        }
    ?>
    <form action="" method="post">
        <p>USUARIO</p>
        <input type="text" name="user">
        <p>CONTRASEÑA</p>
        <input type="password" name="password">
        <p><input type="submit" name="Enviar" value="Login"></p>
    </form>
</body>
</html>
