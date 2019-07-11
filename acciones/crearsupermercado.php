<?php
    // Obtenemos el archivo con la conexion a la base de datos
    require("conexion.php");

    // Mantengo la sesion abierta
    session_start();

    /** 
     *  Obtengo el valor del campo con name titulo-post y texto-post, que
     *  vienen guardadas en la variable global $_REQUEST, y las asigno
     *  a las variables $titulo y $texto
     */
    $nombresupermercado = $_REQUEST["nombre-supermercado"];
    $direccionsupermercado = $_REQUEST["direccion-supermercado"];

    /**  
     * Creo una query para insertar en la tabla publicaciones un nuevo
     * registro con los valores de las variables $titulo y $texto
     * Ademas, usamos la funcion de MySQL now() para guardar en el campo fecha
     * el tiempo exacto en que se creo la publicacion
     * Tambien utilizamos los valores guardados en la session de user-id y comunidad-id
     */ 
    $query = "INSERT INTO supermercados(nombre, direccion) 
    VALUES('" . $nombresupermercado . "', '" . $direccionsupermercado . "')"; 
    
    // Ejecuto la query
    mysqli_query($conexion, $query);

    // Redirijo a home
    header('Location: /comparando/home.php');