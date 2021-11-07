window.addEventListener("load",function(){

    var btnManzana = document.getElementById("btnManzana");
    var btnPera = document.getElementById("btnPera");
    var btnFresa = document.getElementById("btnFresa");
    var btnMelocoton = document.getElementById("btnMelocoton");
    var btnMango = document.getElementById("btnMango");
    var btnSandia = document.getElementById("btnSandia");
    var btnCesta = document.getElementById("btnCesta");

    btnManzana.onclick=function(){cantidadProducto("Manzana")}
    btnPera.onclick=function(){cantidadProducto("Pera")}
    btnFresa.onclick=function(){cantidadProducto("Fresa")}
    btnMelocoton.onclick=function(){cantidadProducto("Melocoton")}
    btnMango.onclick=function(){cantidadProducto("Mango")}
    btnSandia.onclick=function(){cantidadProducto("Sandia")}

    btnCesta.onclick=function(){
        var vector = [];
        var arrayPs = document.querySelectorAll("div p span");
        for (let i = 0; i < arrayPs.length; i++) {
                
            vector.push({nombreProducto: arrayPs[i].id, cantidadComprada: parseInt(arrayPs[i].innerHTML.substr(-1), 10)});
        }

        creaJson(vector);
        
    }

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
    localStorage.setItem("cesta", jsonText);
}

