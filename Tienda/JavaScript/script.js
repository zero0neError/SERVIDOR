window.addEventListener("load",function(){

    var btnManzana = document.getElementById("btnManzana");
    var btnPera = document.getElementById("btnPera");
    var btnFresa = document.getElementById("btnFresa");
    var btnMelocoton = document.getElementById("btnMelocoton");
    var btnMango = document.getElementById("btnMango");
    var btnSandia = document.getElementById("btnSandia");
    var btnCesta = document.getElementById("btnCesta");

    btnManzana.onclick=function(){cantidadProducto("cantidadManzana")}
    btnPera.onclick=function(){cantidadProducto("cantidadPera")}
    btnFresa.onclick=function(){cantidadProducto("cantidadFresa")}
    btnMelocoton.onclick=function(){cantidadProducto("cantidadMelocoton")}
    btnMango.onclick=function(){cantidadProducto("cantidadMango")}
    btnSandia.onclick=function(){cantidadProducto("cantidadSandia")}

});

function cantidadProducto(spanC){

    var spanP = document.getElementById(spanC);
    var spanValue = spanP.innerText;//Cojo el valor del span para hacer comprobaciones
    if (spanValue==""){//Si el span no tiene cantidad la pone, si ya tiene coge el numero de veces y le añade uno

        spanP.innerHTML="Cantidad: 1"
    }else{

        var numeroVeces = (parseInt(spanValue.substr(-1), 10))+1;//ME da el ultimo caracter de la cantidad (el numero en cadena) y lo convierte a numero y le suma 1
        spanP.innerHTML="Cantidad: "+numeroVeces;

    }

}

function creaJson(array){

    var jsonText = JSON.stringify(array);
}

