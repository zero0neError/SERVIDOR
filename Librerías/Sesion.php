<?php
Class Sesion{

    public static init(){

        if(!isset($_SESSION)){

            session_start();
        }
    }

    public static existe($clave){

        (isset($_SESSION[$clave]))?true:false;
    }

    public static getSesion($clave){

        (isset($_SESSION[$clave]))?return $_SESSION[$clave]:return Null;
    }

    public static setSesion($clave,$valor){

        $_SESSION[$clave]=$valor;
    }

    public static removeSesion($clave){

        unset($_SESSION[$clave]);
    }

    public static destroySesion(){

        session_destroy();
    }
}