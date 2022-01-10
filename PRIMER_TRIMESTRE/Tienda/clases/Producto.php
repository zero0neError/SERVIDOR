<?php

Class Producto{

    protected $codigo;
    protected $nombre;
    protected $nC;
    protected $pvp;

    function __construct($lista){

        $this->codigo=$lista['codigo'];
        $this->nombre=$lista['nombre'];
        $this->nombreCorto=$lista['nC'];
        $this->pvp=$lista['pvp'];
    }

    public function getCodigo(){return $this->codigo;}
    public function getNombre(){return $this->nombre;}
    public function getNombreCorto(){return $this->nC;}
    public function getPvp(){return $this->pvp;}

    public function muestra(){

        return $this->nombre." - ".$this->pvp;
    }
}

?>