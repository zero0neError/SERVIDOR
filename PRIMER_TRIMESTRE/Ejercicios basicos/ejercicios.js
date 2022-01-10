//RELACION DE EJERCICIOS 1


//FUNCION POW 

function exp(base){
    return function(exponente){
        return base**exponente;
    }
}

//<!--2 elevado a 8 -->

exponencial2=exp(2);//base 2
alert(exponencial2(8));
//FUNCION QUE DADO UN NUMERO ENTERO Y NUMERO DE CARACTERES DEVULVE UNA CADENA CON ESE NUMERO COMPLETADO CON 0.
//EJ. 17 Y 4-> 0017

function ej2(numero){

    return function(relleno){

        return ;
    }
}
//FUNCION QUE PASADO EL AÑO DE NACIMIENTO ME DEVULVA SI SOY O NO MAYOR DE EDAD

function ej3(año){

    if (2021-año>=18){
        
        alert("Eres mayor de edad")
    }else{

        alert("Eres menor de edad")
    }

}

//FUNCION QUE ADMITA UNO O DOS PARAMETROS(AÑO DE NACIMIENTO, AÑO ACTUAL) AÑO POR DEFECTO 2021 Y ME DICE SI SOY MAYOR DE EDAD

function ej4(añoNacimiento,añoActual=2021){

    if (añoActual-añoNacimiento>=18){

        console.log("Es/Sera mayor de edad");
    }else{

        console.log("Es/Sera menor de edad");
    }
}

//FUNCION QUE DEVULVE LA MEDIA DE LOS VALORES PASADOS

function ej5(){//20,20 -> 20
    sumaTotal=0
    longitud=arguments.length;
    for (var i = 0; i < longitud; i++) {

        sumaTotal=sumaTotal+arguments[i];
    }
    return sumaTotal/longitud;
}

//FUNCION MIN QUE DEVUELVE EL MINIMO DE LOS VALORES PASADOS

function ej6(){//5,3,8 -> 3
    longitud=arguments.length;
    min=arguments[0];
    for (var i = 0; i < longitud; i++) {

        if(arguments[i]<min){

            min=arguments[i];
        }
    }
    return min;
}

//FUNCION SORT QUE DEVUELVE UN ARRAY CON LOS VALORES PASADOS ORDENADOS

function ej7(a) {
    var n, i, k, aux;
    n = arguments.length;
    // Algoritmo de burbuja
    for (k = 1; k < n; k++) {
        for (i = 0; i < (n - k); i++) {
            if (a[i] > a[i + 1]) {
                aux = a[i];
                a[i] = a[i + 1];
                a[i + 1] = aux;
            }
        }
    }

    console.log(a); // Mostramos, por consola, la lista ya ordenada
}
