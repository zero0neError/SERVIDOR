<?php
Class BD{

    private static $conexion;

    public static function conectar(){
        try {
            self::$conexion = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
    // TODO Hacer un metodo versatil q le pases la tabla que quieres insertar y un array con los parametros de la tabla, y el solo te coja la contidad de elementos del array y asi puedasponer tantas interrogaciones como elementos en la consulta
    // public static insertarFila($tabla, $array){

    //     $sql="SELECT "
    // }

    public static function insertaUsuario($usuario, $correo, $contraseña, $rol){

        $u=$usuario;
        $c=$correo;
        $co=$contraseña;
        $r=$rol;
        $sql = "INSERT INTO users values (?,?,?,?)";

        $consulta = self::$conexion->prepare($sql);
        var_dump($consulta);
        $consulta->bindParam(1,$u);
        $consulta->bindParam(2,$c);
        $consulta->bindParam(3,$co);
        $consulta->bindParam(4,$r);
        $consulta->execute();
    
    }

    public static function listadoUsuarios(){

        $arr=array();
        $result = self::$conexion->query("SELECT * FROM users");

        while($registro = $result->fetch(PDO::FETCH_OBJ)){

            array_push($arr, $registro);
        }

        return $arr;

    }

}


