$(document).ready(function(){

    // Muestra el formulario de login
    $("#ir-a-login").click(function(){
        $("#form-registro").hide();
        $("#form-ingreso").show();
        $(".alert-danger").each(function(){
            $(this).hide();
        })
    });

    // Muestra el formulario de registro
    $("#ir-a-registro").click(function(){
        $("#form-registro").show();
        $("#form-ingreso").hide();
        $(".alert-danger").each(function(){
            $(this).hide();
        })
    });
    return;
    $("#boton-loguear").click(function(){

        /**
        VARIABLES
        -------------------------
        - nos permiten guardar valores y acceder a ellos cuando
        querramos
        - sintaxis:
        var nombreVariable = valor;
        - el nombre de la variable va en camelCase,
        todas las palabras juntas, la primera palabra en
        minúscula y las siguientes con la primera letra en mayúscula
        - podemos asignarles todo tipo de valores: numeros, strings, booleanos, entre otros
        - para acceder al valor que tiene almacenado simplemente
        la llamamos por su nombre
        */
        // var usuario = "pablo";
        // var password = "comit2017";
        // var inputPassword = $("#login-password").val();
        // var inputUsuario = $("#login-user").val();

        // var estaLogueado = false;

        // if ( estaLogueado || 
        //     (inputUsuario === "pablo" && 
        //     inputPassword === "comit") 
        // ) {            
        //     alert("Login correcto");
        // } else {            
        //     alert("Login incorrecto");
        // }

        // if (inputUsuario === "" ||
        //     inputPassword === "" ) {            
        //     alert("Tienes que completar todos los campos");
        // } else {            
            
        // }

        /**
        OPERADORES DE COMPARACION
        -------------------------
        - nos permiten comparar dos valores,
        y obtener una respuesta como booleano (true o false,
        verdadero o falso) si la comparación es verdadera o falsa
        - Mayor que: 1 > 2
        - Menor que: 4 < 5
        - Mayor o igual que: 3 >= 3
        - Menor o igual que: 6 <= 5
        - Igual que: 4 === 4 
        - Menor que: 3 !== 4
        */

        /**
        CONDICIONALES
        -------------------------
        - nos permite ejecutar una porción o bloque de código
        dependiendo de si cierta condición es verdadera
        - sintaxis:
            if (condicion) {
                codigo a ejecutar si condicion es true
            } else {
                codigo a ejecutar si condicion es false
            }
        - el else no es obligatorio, y siempre va en relacion a un if               
        */


        // if (inputPassword === password) {
        //     /**
        //         este bloque de código se ejecuta si el valor
        //         almacenado en la variable inputPassword es igual
        //         a el valor almacenado en la variable password
        //     */
        //     alert("Contraseña correcta");
        // } else {
        //     /**
        //         este bloque de código se ejecuta si la condición del if es falsa,
        //         que viene a ser lo opuesto, es decir, si el valor
        //         almacenado en la variable inputPassword es distinto
        //         a el valor almacenado en la variable password
        //     */            
        //    alert("Contraseña incorrecta");
        // }

        // Operadores logicos

        // && AND (Y) todas las comparaciones
        // tienen que ser true para que la condicion sea true
        // si alguna condicion es falsa, devuelve falso
        // condicion1 && condicion2 && condicion3
        
        // || OR (O) al menos una de las comparaciones
        // tiene que ser true para que la condicion sea true
        // si alguna condicion es verdadera, devuelve verdadero
        // condicion1 || condicion2 || condicion3


        // if (inputUsuario === "" || 
        //     inputPassword === "") {
        //     alert("Por favor complete todos los campos")
        // } else {
        //     if (inputUsuario === usuario && 
        //         inputPassword === password) {
        //         alert("Login correcto");
        //     } else {
        //        alert("Login incorrecto");
        //     }
        // }
    });
});