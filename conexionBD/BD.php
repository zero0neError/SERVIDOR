<?php
Class BD{

    private $Conexion;

    public static conectar(){
        try {
            $Conexion = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
    // TODO Hacer un metodo versatil q le pases la tabla que quieres insertar y un array con los parametros de la tabla, y el solo te coja la contidad de elementos del array y asi puedasponer tantas interrogaciones como elementos en la consulta
    // public static insertarFila($tabla, $array){

    //     $sql="SELECT "
    // }
}

// $result = $Conexion->query("SELECT * FROM users");

// while($registro = $result->fetch(PDO::FETCH_OBJ)){

//     //echo "Nombre ".$registro['Nombre']."<br>Correo: ".$registro['CorreoElectronico']."<br>Contraseña: ".$registro['Contraseña']."<br>Rol: ".$registro['Rol'];
//     echo "Nombre ".$registro->Nombre."<br>Correo: ".$registro->CorreoElectronico."<br>Contraseña: ".$registro->Contrasena."<br>Rol: ".$registro->Rol."<br><br>";
// }

if(isset($_POST['txtUsuario']) && isset($_POST['txtCorreo']) && isset($_POST['txtContraseña']) && isset($_POST['seleccionRol'])){

    $consulta = $Conexion->prepare('INSERT INTO users(Usuario, CorreoElectronico, Contrasena, Rol) values (:Usuario,:CorreoElectronico,:Contrasena,:Rol)');
    $consulta->bindParam(1, $_POST['txtUsuario']);
    $consulta->bindParam(2, $_POST['txtCorreo']);
    $consulta->bindParam(3, $_POST['txtContraseña']);
    $consulta->bindParam(4, $_POST['seleccionRol']);
    $consultas->exec();
    header("Location: index.php");
}