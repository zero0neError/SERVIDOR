window.addEventListener("load",function(){

    const enviar=document.getElementById("Enviar");
    const form = document.getElementById("form1");
    var usuario = form["txtUsuario"];
    var mensaje = form["areaMensaje"];
    enviar.onclick=function(ev){
        ev.preventDefault();
        if(usuario.value!="" && mensaje.value!=""){

            var texto = encodeURI("Enviar=&txtUsuario=" + usuario.value + "&" + "areaMensaje=" + mensaje.value)
            const ajax = new XMLHttpRequest();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4 && ajax.status==200){
                    var respuesta = ajax.responseText;
                    alert(respuesta);
                }

            }
            ajax.open("POST","esclavo.php");
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send(texto);
        }
    }
});