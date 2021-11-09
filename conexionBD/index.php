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
        require_once("BD.php");
        if(isset($_POST['Enviar'])){

        }
        ?>
    <form method="post" action="">
        <p>Nombre de usuario: <input type="text" name="txtUsuario"></p>
        <p>Correo Electronico: <input type="text" name="txtCorreo"></p>
        <p>Contraseña: <input type="text" name="txtContraseña"></p>
        <select name="seleccionRol">
            <option>Admin</option>
            <option>Usuario estandar</option>
        </select>
        <p><input type="submit" name="Enviar" value="Registrarse"></p>
      </form>
      
</body>
</html>


      
    