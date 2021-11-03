<?php

Class Producto{

    private $codigo;
    private $nombre;
    private $nC;
    private $pvp;

    function __construct($lista){

        $this->$codigo=$lista['codigo'];
        $this->$nombre=$lista['nombre'];
        $this->$nombreCorto=$lista['nC'];
        $this->$pvp=$lista['pvp'];
    }

    public function getCodigo(){return $codigo;}
    public function getNombre(){return $nombre;}
    public function getNombreCorto(){return $nC;}
    public function getPvp(){return $pvp;}

    public function muestra(){

        return $nombre." - ".$pvp;
    }
}

?>