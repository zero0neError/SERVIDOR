<?php
Class Sesion{

    public static function init(){

        if(!isset($_SESSION)){

            session_start();
        }
    }

    public static function existe($clave){

        (isset($_SESSION[$clave]))?true:false;
    }

    public static function getSesion($clave){

        if(isset($_SESSION[$clave])){
            return $_SESSION[$clave];
        }else{
            return null;
        }    
        
    }
    
    public static function setSesion($clave,$valor){

        $_SESSION[$clave]=$valor;
    }

    public static function removeSesion($clave){

        unset($_SESSION[$clave]);
    }

    public static function destroySesion(){

        session_destroy();
    }
}