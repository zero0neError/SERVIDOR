<?php
Class Usuario{

    protected $email;
    protected $nick;
    protected $contraseña;

    function __construct($email,$nick,$contraseña){
        setEmail($email);
        setNick($nick);
        setContraseña($contraseña);
    }

    public sesion($email,$nick){

        setEmail($email);
        setNick($nick);
    }

    public setEmail($contraseña){this->$email=$email};
    public setNick($contraseña){this->$nick=$nick};
    public setContraseña($contraseña){this->$contraseña=$contraseña};

    public getEmail(){return this->$email};
    public getNick(){return this->$nick};
    public getContraseña(){return this->$contraseña};
}
