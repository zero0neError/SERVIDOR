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
    // TODO Hacer un metodo versatil q le pases la tabla que quieres insertar y un array con los parametros de la tabla que quieres insertar, y el solo te coja la contidad de elementos del array y asi puedas poner tantas interrogaciones como elementos en la consulta
    public static function insertarFila($BD,$tabla,$array){

        //BLOQUE1________ESTE BLOQUE SE ENCARGA DE LEER EL NOMBRE DE LAS COLUMNAS DE UNA TABLA
        $numeroColumas=0;
        $nombresColumnas=array();
        $sql="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = '$BD' and TABLE_NAME = '$tabla'";
        $result = self::$conexion->query($sql);
        while($registro = $result->fetch()){
            ++$numeroColumas;
        }
        
        //____________BLOQUE1

        //BLOQUE2________se encarga de añadir las interrograciones dependiendo del numeroColumnas
        $sql="INSERT INTO $tabla values (".str_repeat("?,",$numeroColumas);
        $sql_final=substr($sql,0,(strlen($sql)-1)).")";
        $consulta = self::$conexion->prepare($sql_final);
        $count=0;
        for($i=0;$i<count($array);$i++){
            $consulta->bindParam(++$count,$array[$i]);
        }
        $consulta->execute();

        //____________BLOQUE2
    }

    public static isUser($tabla,$email,$nick,$contraseña){
        $sql="select * from $tabla where email like '$email' AND password like '$contraseña'";
        $consulta=self::conexion->query($sql);
        ($consulta!=false)?(return true):(return false);
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


