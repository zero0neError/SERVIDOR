<?php

function pintaDetallesEjercicio($datos){

echo "<h4 style="."color:green>".$datos['titulo1']."</h4>";

echo "<p>".$datos['contenido1']."</p>";

echo "<h5 style="."color:green>".$datos['titulo2']."</h5>";

echo "<p style=font-weight:600>".$datos['contenido2']."<br></p>";

echo "<h5 style="."color:green>".$datos['titulo3']."</h5>";

echo "<p>".$datos['contenido3']."</p>";
}

function estilosa($texto,$numero=0){
    
    switch ($numero) {
        case '1':
            $linea="<h1>".$texto."</h1>";
            break;
        case '2':
            $linea="<h2>".$texto."</h2>";
            break;
        case '3':
            $linea="<h3>".$texto."</h3>";
            break;
        case '4':
            $linea="<h4>".$texto."</h4>";
            break;
        case '5':
            $linea="<h5>".$texto."</h5>";
            break;
        case '6':
            $linea="<h6>".$texto."</h6>";
            break;
        default:
            $linea="";
            break;

    }

    return $linea;

}

function creaLinea($tabla,$i){

    $cadena="";
    if(strlen($i)==1){

        $cadena=$tabla." x&nbsp;&nbsp;&nbsp;".$i." = ";
    }

    if(strlen($i)==2){

        $cadena=$tabla." x ".$i." = ";
    }              

    if(strlen($tabla*$i)==1){

        $cadena=$cadena."&nbsp;&nbsp;".$tabla*$i."<br>";
    }
    
    if(strlen($tabla*$i)==2){

        $cadena=$cadena.$tabla*$i."<br>";
    }

    return $cadena;
}

function validaDni($dni){

    $letraDni = substr($dni,8,9);
    $indexLetra =substr($dni,0,8)%23;
    $letrasValidas="TRWAGMYFPDXBNJZSQVHLCKE";

    return $letrasValidas[$indexLetra]==$letraDni;

    
}