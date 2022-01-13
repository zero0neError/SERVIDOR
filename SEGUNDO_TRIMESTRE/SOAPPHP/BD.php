<?php
Class BD{

    private static $conexion;


    public static function conectar(){
        try {
            self::$conexion = new PDO("mysql:host=localhost;dbname=autoescuela", 'root', '');
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public static function getConexion(){

        return self::$conexion;
    }
    // TODO Hacer un metodo versatil q le pases la tabla que quieres insertar y un array con los parametros de la tabla que quieres insertar, y el solo te coja la contidad de elementos del array y asi puedas poner tantas interrogaciones como elementos en la consulta
    public static function insertarFila($BD,$tabla,$array){

        //BLOQUE1________ESTE BLOQUE SE ENCARGA DE LEER EL NOMBRE DE LAS COLUMNAS DE UNA TABLA
        $numeroColumas=0;
        $nombresColumnas=array();
        $sql="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = '.$BD.' and TABLE_NAME = '$tabla'";
        $result = self::$conexion->query($sql);
        while($registro = $result->fetch()){
            ++$numeroColumas;
        }
        
        //____________BLOQUE1

        //BLOQUE2________Se encarga de añadir las interrograciones dependiendo del numeroColumnas
        $sql="INSERT INTO $tabla values (".str_repeat("?,",$numeroColumas);
        $sql_final=substr($sql,0,(strlen($sql)-1)).")";
        $consulta = self::$conexion->prepare($sql_final);
        $cont=0;
        // for($i=0;$i<count($array);$i++){
        //     $consulta->bindParam($cont++,$array[$i]);
        //     echo $cont;
        // }
        
        $consulta->bindParam(1,$a);
        $consulta->bindParam(2,$b);
        $consulta->bindParam(3,$c);
        $consulta->bindParam(4,$d);
        $consulta->bindParam(5,$e);
        
        if(!$consulta->execute()){

            echo "false";
        }

        //____________BLOQUE2
    }

    public static function insertaFilaMensaje($usuario,$mensaje,$img){
        $sql="INSERT INTO mensaje (Usuario, Mensaje, Hora) values (?,?,NOW(),?)";
        $consulta = self::$conexion->prepare($sql);
        $consulta->bindParam(1,$usuario);
        $consulta->bindParam(2,$mensaje);
        $consulta->bindParam(3,$img);

        if($consulta->execute()){
            return true;
        }else{
            return false;
        }

    }

    public static function existeCorreo($correo){

        $sql="select * from usuario where email like '${correo}'";
        $consulta=self::$conexion->query($sql);
        $count = $consulta->rowCount();
        return $count==1;
    }

    public static function introduceHash($correo,$hash){

        $sql = "UPDATE usuario SET hash=? WHERE email=?";
        $consulta= self::$conexion->prepare($sql);
        $consulta->bindParam(1,$hash);
        $consulta->bindParam(2,$correo);
        return $consulta->execute();
    }

    public static function insertUsuario($usuario){
        $email=$usuario->getEmail();
        $nombre=$usuario->getNombre();
        $ape=$usuario->getApellidos();
        $fecha=$usuario->getFechaNacimiento();
        $rol=$usuario->getRol();
        $sql="INSERT INTO usuario VALUES (NULL,?,?,?,NULL,?,?,NULL,NULL)";        
        $consulta=self::$conexion->prepare($sql);
        $consulta->bindParam(1,$email);
        $consulta->bindParam(2,$nombre);
        $consulta->bindParam(3,$ape);
        $consulta->bindParam(4,$fecha);
        $consulta->bindParam(5,$rol);

        return $consulta->execute();
   
    }

    /** Vuelca todas las tematicas de la base de datos
     *  @return Devuelve un array de objetos tematica o por otro lado devuelve un Exception
     */
    public static function traeTematicas(){

        try {
            $sql="SELECT * FROM tematica";
            $consulta=self::$conexion->query($sql);
            $arr=array();
            while ($result = $consulta->fetch(PDO::FETCH_OBJ)) {//Nos traemos los resultado en forma de objeto 
            
                array_push($arr,$result);//Guardamos el array de objetos
            }

            return $arr;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /** Vuelca todas las tematicas de la base de datos
     *  @return Devuelve un array de objetos tematica o por otro lado devuelve un Exception
     */
    public static function traeUsuarios(){

        BD::conectar();
        try {
            $sql="SELECT * FROM usuario";
            $consulta=self::$conexion->query($sql);
            $arr=array();
            while ($result = $consulta->fetch(PDO::FETCH_OBJ)) {//Nos traemos los resultado en forma de objeto 
            
                array_push($arr,$result);//Guardamos el array de objetos
            }

            return $arr;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function traeUsuariosPorCorreo($correo){

        try {
            $sql="SELECT * FROM usuario WHERE email='$correo'";
            $consulta=self::$conexion->query($sql);
            $arr=array();
            while ($result = $consulta->fetch(PDO::FETCH_OBJ)) {//Nos traemos los resultado en forma de objeto 
                
                array_push($arr,$result);//Guardamos el array de objetos
            }

            return $arr;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /** Vuelca todas las tematicas de la base de datos
     *  @return Devuelve un array de objetos tematica o por otro lado devuelve un Exception
     */
    public static function traeExamenes(){

        try {
            $sql="SELECT * FROM examen";
            $consulta=self::$conexion->query($sql);
            $arr=array();
            while ($result = $consulta->fetch(PDO::FETCH_OBJ)) {//Nos traemos los resultado en forma de objeto 
            
                array_push($arr,$result);//Guardamos el array de objetos
            }

            return $arr;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /** Vuelca todas las tematicas de la base de datos
     *  @return Devuelve un array de objetos tematica o por otro lado devuelve un Exception
     */
    public static function traePreguntas(){

        try {
            $sql="SELECT * FROM preguntas";
            $consulta=self::$conexion->query($sql);
            $arr=array();
            while ($result = $consulta->fetch(PDO::FETCH_OBJ)) {//Nos traemos los resultado en forma de objeto 
            
                array_push($arr,$result);//Guardamos el array de objetos
            }

            return $arr;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function resetHash($hash){

        $sql = "UPDATE usuario SET hash=NULL WHERE hash=?";
        $consulta= self::$conexion->prepare($sql);
        $consulta->bindParam(1,$hash);
        return $consulta->execute();
    }

    public static function insertarPregunta($objPregunta){

        $enunciadoPregunta=$objPregunta->getEnunciado();
        $nombreTematica=$objPregunta->getTematica();
        $sql1="SELECT Id FROM tematica WHERE Nombre like $nombreTematica";
        $consulta = self::$conexion->query($sql1);
        while($idTematica=$consulta->fetch()){
            echo $resul;
        }
        //$idTematica=$consulta->fetch();
        if($idTematica!=""){

            $sql = "INSERT INTO preguntas VALUES(NULL,?,NULL,NULL,?)";
            $consulta=self::$conexion->prepare($sql);
            $consulta->bindParam(1,$enunciadoPregunta);
            $consulta->bindParam(2,$nombreTematica);
        }
    }

    public static function borraUsuario($email){

        $sql="DELETE FROM usuario WHERE email=?";
        $consulta=self::$conexion->prepare($sql);
        $consulta->bindParam(1,$email);
        return $consulta->execute();
    }

    public static function insertarTematica($nombre){

        $sql="INSERT INTO tematica (id,nombre) VALUES (NULL,?)";
        $consulta = self::$conexion->prepare($sql);
        $consulta->bindParam(1,$nombre);
        return $consulta->execute();
    }

    public static function existeTematica($tematica){

        $sql="SELECT * FROM tematica WHERE nombre like '$tematica'";
        $consulta=self::$conexion->query($sql);
        $count = $consulta->rowCount();
        return $count==1;
    }

    public static function updatePassword($hash,$pass){

        $sql = "UPDATE usuario SET password=? WHERE hash=?";
        $consulta= self::$conexion->prepare($sql);
        $consulta->bindParam(1,$pass);
        $consulta->bindParam(2,$hash);
        return $consulta->execute();
           
    }

    public static function existeHash($hash){

        $sql="SELECT * FROM usuario WHERE hash like '$hash'";
        $consulta=self::$conexion->query($sql);
        $count = $consulta->rowCount();
        return $count==1;
    }

    public static function isUser($email,$contraseña){
        $sql="select * from usuario where email like '${email}' AND password like '${contraseña}'";
        $consulta=self::$conexion->query($sql);
        $count = $consulta->rowCount();
        return $count==1;
    }

    public static function listadoContenidoTabla($tabla){

        $arr=array();
        $result = self::$conexion->query("SELECT * FROM '$tabla'");

        while($registro = $result->fetch(PDO::FETCH_OBJ)){

            array_push($arr, $registro);
        }

        return $arr;

    }

}


