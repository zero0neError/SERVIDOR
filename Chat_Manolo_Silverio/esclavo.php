<?php
    if(isset($_POST['Enviar'])){
        include_once "BD.php";
        if(BD::conectar()){
            if(BD::insertaFilaMensaje($_POST["txtUsuario"],$_POST["areaMensaje"])){

                echo "OK!";
            }else{
                echo "ERROR!";
            }
            //BD::insertarFila("mensaje",array("",$_POST["txtUsuario"],$_POST["areaMensaje"],"NOW()"));
        }
    }
?>