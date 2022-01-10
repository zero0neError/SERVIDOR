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
        if(isset($_POST['Enviar']) && $_POST['email']!=""){
            
            require_once "libs/BD.php";
            require_once "libs/Sesion.php";
            require_once "libs/Usuario.php";
            if(BD::Conectar()){

                $respuesta = BD::isUser($users,$_POST['email'],$_POST['email'], $_POST['password']);

                if($respuesta!=false){

                    Sesion::init();
                    $user=new Usuario();
                    $user->sesion($_POST['email'],$_POST['email']);
                    Sesion::setSesion("usuario",$user);
        
            }
        }
    ?>
    <form action="" method="post">
        <p>EMAIL</p>
        <input type="text" name="email">
        <p>NICK</p>
        <input type="text" name="nick">
        <p>CONTRASEÑA</p>
        <input type="password" name="password">
        <p><input type="submit" name="Enviar" value="Login"></p>
    </form>
    
</body>
</html>
