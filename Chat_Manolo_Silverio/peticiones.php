<?php
if(isset($_GET['peticion'])){

    if($_GET['peticion']=="pedirMensajes"){
        include_once "BD.php";
           
        if(BD::conectar()){

            if (isset($_GET['ultimo'])){
                $siguiente=$_GET["ultimo"] +1;
            }
            else{
                $siguiente=1;
            }

            $sql="SELECT * FROM mensaje where Id>=${ultimoId}";
            $consulta = BD::conexion->query($sql);
            $object=new stdClass();
            $object->mensajes=[];
            $ultimo=$siguiente-1;
            while($registro = $consulta->fetch()){
    
                $objMensaje =  new stdClass();
                $objMensaje->id=$registro['Id'];
                $objMensaje->usuario=$registro['Usuario'];
                $objMensaje->mensaje=$registro['Mensaje'];
                $objMensaje->fecha=$registro['Hora'];
            
                $object->mensajes[]=$objMensaje;
                $ultimo=$registro['Id'];
            }
            $object->ultimo=$ultimo;
            echo json_encode($object);
        }
        
    }

    if($_GET['peticion']=="escribirMensajes"){

        if(isset($_POST['enviar'])){
            include_once "BD.php";
            if(BD::conectar()){
                if(BD::insertaFilaMensaje($_POST["txtUsuario"],$_POST["areaMensaje"])){
                    echo "OK!";
                }else{
                    echo "ERROR!";
                }
                
            }
        }
    }
  
}else{

    //Si no viene ninguna opcion por get
}
