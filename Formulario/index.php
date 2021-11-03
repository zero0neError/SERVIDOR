<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../libs/libs.php";
        $form=
        "<form action=\"\" method=\"post\">

            <p><label>Nombre: </label><input type=\"text\" name=\"nombre\" value=\"%s\"></p>
            <p><label>Primer apellido: </label><input type=\"text\" name=\"apellido1\" value=\"%s\"></p>
            <p><label>Segundo apellido: </label><input type=\"text\" name=\"apellido2\" value=\"%s\"></p>
            <p><label>Dni: </label><input type=\"text\" name=\"dni\" value=\"%s\"></p>
            <p><label>Correo Electronico: </label><input type=\"text\" name=\"email\" value=\"%s\"></p>
            <p><label>Fecha de nacimiento: </label><input type=\"text\" name=\"fecha\" value=\"%s\"></p>
            <p><label>Url: </label><input type=\"text\" name=\"url\" value=\"%s\"></p>
        
            <button type=\"submit\" name=\"boton\">Validar</button>

        </form>";
        echo sprintf($form,"","","","","","","");

        if(isset($_POST['boton'])){

            //COMPRUEBO SI EXISTE EL DNI Y SI ES CORRECTO
            /*
            if(isset($_POST['dni'])){

                if(validaDni($_POST['dni'])){

                    $dniReflejado=$_POST['dni'];
                }else{

                    $dniReflejado="";
                }
            }
            */
            //COMPRUEBO SI EL CORREO EXISTE Y ES CORRECTO

            

            $pattEmail="\/^((([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})))$\/";

            if (isset($_POST['email'])){

                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        
                }

                if(preg_match($pattEmail,$_POST['email'])){

                    $emailReflejado=$_POST['email'];
                }else{

                    $emailReflejado="";
                }
            }
            
        }
    ?>
</body>
</html>


