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
        require_once "BD.php";
        if(isset($_POST['Enviar'])){
            if(BD::conectar()){
                
                //BD::insertaUsuario($_POST['txtUsuario'],$_POST['txtCorreo'],$_POST['txtContraseña'],$_POST['seleccionRol']);
                BD::insertarFila("users",array($_POST['txtUsuario'],$_POST['txtCorreo'],$_POST['txtContraseña'],$_POST['seleccionRol']));
            } 
        }
        if(isset($_POST['Listado'])){
            if(BD::conectar()){
                $arr=array();
                $arr = BD::listadoUsuarios();
                foreach ($arr as $v) {
                    printf("<p>
                                Usuario: %s<br>
                                Correo: %s<br>
                                Contraseña: %s<br>
                                Rol: %s
                            </p>",$v->Nombre,$v->CorreoElectronico,$v->Contrasena,$v->Rol);
                }

                
            } 
        }
    ?>
    <form method="post" action="#">
        <p>Nombre de usuario: <input type="text" name="txtUsuario"></p>
        <p>Correo Electronico: <input type="text" name="txtCorreo"></p>
        <p>Contraseña: <input type="text" name="txtContraseña"></p>
        <select name="seleccionRol">
            <option>Admin</option>
            <option>Usuario estandar</option>
        </select>
        <p><input type="submit" name="Enviar" value="Registrarse"></p>
        <p><input type="submit" name="Listado" value="Ver usuarios (detallados)"></p>
      </form>
      
</body>
</html>


      
    