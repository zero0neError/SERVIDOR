<?php
include("Producto.php");
Class BD{
    
    private static $lista=array();

    public static function obtieneProductos(){

        return self::$lista;
    }

    public static function obtieneProducto($codigo){

        return self::$lista[$codigo];
    }
/*
    public static function verificaCliente($username,$password)){

        //HARIAMOS CONSULTA A LA BASE DE DATOS Y BUSCARIAMOS EL USUARIO EN LA BASE DE DATOS DEVOLVIENDO UN BOOLEANO
    }
*/
    public static function insertarProducto(Producto $p){

        if(!isset(self::$lista[$p->getCodigo()])){
            
            self::$lista[$p->getCodigo()] = $p;
        }
    }

    public static function llenaLista(){

        self::$lista[0] = new Producto(array("codigo" => 1,"nombre" => "Manzana","nC" => "Man","pvp" => 12));
        self::$lista[1] = new Producto(array("codigo" => 2,"nombre" => "Pera","nC" => "Per","pvp" => 13));
        self::$lista[2] = new Producto(array("codigo" => 3,"nombre" => "Fresa","nC" => "Fre","pvp" => 3));
        self::$lista[3] = new Producto(array("codigo" => 4,"nombre" => "Melocoton","nC" => "Mel","pvp" => 8));
        self::$lista[4] = new Producto(array("codigo" => 5,"nombre" => "Mango","nC" => "Mang","pvp" => 21));
        self::$lista[5] = new Producto(array("codigo" => 6,"nombre" => "Sandia","nC" => "San","pvp" => 30));

    }

}

?>